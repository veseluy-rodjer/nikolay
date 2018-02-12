<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $date = ['title' => 'Сайты-визитки. Портфолио'];
        return view('portfolio', $date);
    }
}
