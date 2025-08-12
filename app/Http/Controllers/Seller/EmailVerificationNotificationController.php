<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user("seller")->hasVerifiedEmail()) {
            return redirect()->intended(route('seller.dashboard', absolute: false));
        }

        $request->user("seller")->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
