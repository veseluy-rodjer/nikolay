<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $date = ['title' => 'Сайты-визитки. Обо мне'];
        return view('about', $date);
    }
}
