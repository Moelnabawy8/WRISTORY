<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * عرض صفحة إعادة تعيين كلمة المرور.
     */
    public function create(Request $request): View
    {
        return view('seller.reset-password', ['request' => $request]);
        // يُفضل تخصص View للـ Admin
    }

    /**
     * معالجة طلب إعادة تعيين كلمة المرور.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // استخدام broker خاص بـ admins
        $status = Password::broker('sellers')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (Seller $seller) use ($request) {
                $seller->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($seller));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('seller.login')->with('status', __($status))
            : back()->withInput($request->only('email'))
                    ->withErrors(['email' => __($status)]);
    }
}
