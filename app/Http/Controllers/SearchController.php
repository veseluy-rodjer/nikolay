<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Http\Requests\StoreSearch;

class SearchController extends Controller
{
    public function index(StoreSearch $request)
    {
        $search = $request->search;
        $listing = BlogModel::search($search);
        $date = ['title' => 'Сайты-визитки. Блог', 'listing' => $listing];
        if (count($listing) == 0) {
            return response('Такой записи не существует');
        }
        return view('blog', $date);
    }
}
