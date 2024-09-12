<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class EmailController extends Controller
{
    public function sendWelcomeEmail(){
        $toEmail = 'quintom53@gmail.com';
        $message = '';
        $subject = 'Welcome Email in Laravel Using Gmail';

        $response = Mail::to($toEmail)->send(new WelcomeEmail($message, $subject));

        dd($response);

    }
}
