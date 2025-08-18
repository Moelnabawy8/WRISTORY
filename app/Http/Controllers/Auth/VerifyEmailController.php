<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user("web")->hasVerifiedEmail()) {
            return redirect()->route('home')->with('verified', 1);
        }

        if ($request->user("web")->markEmailAsVerified()) {
            event(new Verified($request->user("web")));
        }

        return redirect()->route('home')->with('verified', 1);
    }
}
