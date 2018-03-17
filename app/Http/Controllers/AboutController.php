<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TeamModel;
use App\Http\Requests\StoreTeam;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkTeam')->only('show', 'edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listing = TeamModel::listing();        
        $date = ['title' => 'Сайты-визитки. Обо мне', 'listing' => $listing];
        return view('about', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = ['title' => 'Сайты-визитки. Обо мне'];
        return view('about/create', $date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeam $request)
    {
        $picture = null;
        if (!empty($request->picture)) {
            $picture = Storage::disk('public')->url($request->picture->store('about', 'public'));
        }
        TeamModel::store($picture, $request->name, $request->profession);
        return redirect('about');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = TeamModel::edit($id);
        $date = ['title' => 'Сайты-визитки. Блог', 'edit' => $edit];
        return view('about/edit', $date);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeam $request, $id)
    {
        $picture = null;
        if (!empty($request->picture)) {
            $picture = Storage::disk('public')->url($request->picture->store('about', 'public'));
        }
        TeamModel::up($id, $picture, $request->name, $request->profession);
        return redirect('about');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TeamModel::destroy($id);
        return redirect('about');
    }
    
    public function delPicture($id)
    {
        TeamModel::delPicture($id);
        return back();
    }
}
