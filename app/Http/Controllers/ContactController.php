<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreContact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = ['title' => 'Сайты-визитки. Контакты', 'm' => 'mail'];
        return view('contact', $date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        $message = wordwrap($message, 70, "\r\n");
        $headers = 'From: nikolay@nikolay.kl.com.ua' . "\r\n";
        if (mail('mukataev@gmail.com', $subject, $message, $headers, $email)) {
            $mail = 'Ваше письмо успешно отправлено';
        }
        else {
            $mail = 'Неудалось отправить письмо, что-то не так...';
        }        
        $date = ['title' => 'Сайты-визитки. Контакты', 'm' => $mail];
        return view('contact', $date);
    }
}
