<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $date = ['title' => 'Сайты-визитки. Блог'];
        return view('blog', $date);
    }
}
