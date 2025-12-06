<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Mail\OrderInvoiceMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Get cart data from session
        $cart = session('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty.');
        }

        // Calculate grand total
        $grandTotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // Decrement Product Stock
        foreach ($cart as $productId => $item) {
            Product::where('id', $productId)
                    ->decrement('stock', $item['quantity']);
        }


        // Generate PDF filename
        $nameSlug = strtolower(str_replace(' ', '-', $request->name));
        $fileName = "invoice-{$nameSlug}-" . time() . ".pdf";
        $filePath = public_path("invoices/{$fileName}");

        // Create PDF with product details
        Pdf::loadView('pdf.invoice', [
            'name'        => $request->name,
            'email'       => $request->email,
            'cart'        => $cart,
            'grandTotal'  => $grandTotal,
        ])
        ->setPaper('a4', 'portrait')
        ->save($filePath);

        // Send email with PDF attached
        Mail::to($request->email)->send(
            new OrderInvoiceMail($request->name, $cart, $grandTotal, $fileName)
        );


        // Optional: Clear cart after confirming
        session()->forget('cart');

        return back()->with('success', 'Invoice PDF generated and sent to your email!');
    }
}


