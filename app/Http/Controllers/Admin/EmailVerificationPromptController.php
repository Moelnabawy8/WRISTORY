<?php
namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user("admin")->hasVerifiedEmail()
                                      ? redirect()->intended(route('home', absolute: false))
                    : view('admin.verify-email');
    }
}
