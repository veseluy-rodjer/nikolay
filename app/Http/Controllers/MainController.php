<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $date = ['title' => 'Сайты-визитки. Главная'];
        return view('main', $date);
    }
}
