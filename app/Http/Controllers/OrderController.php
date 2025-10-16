<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoiceMail;

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

        // Generate PDF filename
        $nameSlug = strtolower(str_replace(' ', '-', $request->name));
        $fileName = "invoice-{$nameSlug}-" . time() . ".pdf";
        $filePath = public_path("invoices/{$fileName}");

        // Create PDF with product details
        Pdf::view('pdf.invoice', [
            'name'        => $request->name,
            'email'       => $request->email,
            'cart'        => $cart,
            'grandTotal'  => $grandTotal,
        ])->save($filePath);

        // Send email with PDF attached
        Mail::to($request->email)->send(
            new OrderInvoiceMail($request->name, $cart, $grandTotal, $fileName)
        );

        // Optional: Clear cart after confirming
        session()->forget('cart');

        return back()->with('success', 'Invoice PDF generated and sent to your email!');
    }
}
