<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
     public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('watch')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function store( Watch $watch)
    {
        $cartItem = Cart::firstOrCreate(
            ['user_id' => Auth::id(), 'watch_id' => $watch->id],
            ['quantity' => 0]
        );

        $cartItem->increment('quantity', 1);

        return redirect()->route('cart.index')->with('success', 'تمت إضافة الساعة إلى السلة');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'تم حذف العنصر من السلة');
    }
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->update(['quantity' => $request->input('quantity')]);

        return redirect()->route('cart.index')->with('success', 'تم تحديث الكمية بنجاح');
    }
}

