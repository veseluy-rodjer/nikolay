<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;     
        $date = ['title' => 'Сайты-визитки. Контакты'];
        return view('contact', $date);

    }

}
