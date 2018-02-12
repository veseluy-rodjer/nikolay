<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $date = ['title' => 'Сайты-визитки. Контакты'];
        return view('contact', $date);

    }

}
