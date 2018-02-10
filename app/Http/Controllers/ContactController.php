<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->user();
        return view('contact', array('name' => $name));

    }

}
