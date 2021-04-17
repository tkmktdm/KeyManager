<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    //use SendsPasswordResetEmails;
    use ResetsPasswords;
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    //public function showLinkRequestForm()
    public function showResetForm(Request $request, $token = null)
    {
        // admin-view
        return view('admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
        //return view('admin.auth.passwords.email');
    }
    public function broker()
    {
        // admin-pass-broker
        return Password::broker('admins');
    }
}
