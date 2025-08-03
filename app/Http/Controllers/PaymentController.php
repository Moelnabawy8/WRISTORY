<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Watch;
use App\Models\Category;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    public function redirectToStripe(Request $request , $watchId)
    {
        $user = $request->user();
    $watch = Watch::findOrFail($watchId);

    if (!$watch->stripe_price_id) {
        abort(404, 'هذا المنتج غير متوفر للدفع حالياً.');
    }

    return $user->checkout([
        $watch->stripe_price_id => 1
    ], [
        'success_url' => route('checkout-success'),
        'cancel_url' => route('checkout-cancel'),
        'mode' => 'payment',
    ]);
    }
    public function success()
    {
        $watches = Watch::all();
        $categories = Category::all();
        $brands = Brand::all();
        $selectedBrand = null;
        $selectedCategory = null;

        return view("watches.index",compact('watches', 'categories', 'brands', 'selectedBrand', 'selectedCategory'))
            ->with('success', 'تم الدفع بنجاح');
    }
  

}
