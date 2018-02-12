<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $date = ['title' => 'Сайты-визитки. Сервис'];
        return view('services', $date);
    }
}
