<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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

    use SendsPasswordResetEmails;

    public function postEmail(Request $request){
        $details = [
            'title' => "Test from Ambala IT",
            'body'  => "loren ipsum dolor sit amet"
        ];
        $userMail = 'nisha.afroza1998@gmail.com';

        \Mail::to($userMail)->send(new \App\Mail\Mailer($details));
        echo "Done";
    }
}
