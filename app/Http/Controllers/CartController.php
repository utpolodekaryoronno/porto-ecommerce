<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // 🛒 Show Cart Page
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // 🛒 Add Product to Cart
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        $image = $product->gallery->first()->file_name ?? 'noimage.png';
        $imageUrl = asset('media/product/' . $image);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->sale_price ?? $product->regular_price,
                'image' => $imageUrl,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        // redirect cart index page
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // 🧮 Update Quantity
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Safely convert text input to integer
            $quantity = (int) $request->quantity;
            $quantity = $quantity > 0 ? $quantity : 1;

            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        // Recalculate totals
        $itemTotal = $cart[$id]['price'] * $cart[$id]['quantity'];
        $grandTotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        return response()->json([
            'itemTotal' => number_format($itemTotal, 2),
            'grandTotal' => number_format($grandTotal, 2),
        ]);
    }





    // ❌ Remove Item
    public function destroy($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed successfully!');
    }
}
