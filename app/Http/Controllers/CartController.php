<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('cart.index', compact('cartItems'));
    }

    public function add($productId)
    {
        $product = Product::findOrFail($productId);
        // return response()->json($product);

        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => uniqid($product->id),
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));
        // return response()->json($product);
        return redirect()->route('cart.index');
    }

    public function destroy($itemId)
    {
        \Cart::session(auth()->id())->remove($itemId);
        return back();
    }

    public function update($itemId)
    {
        \Cart::session(auth()->id())->update($itemId,[
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            ),
        ]);
        return back();
    }

    public function checkout()
    {
        return view('cart.checkout');
    }
}
