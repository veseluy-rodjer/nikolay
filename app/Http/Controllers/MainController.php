<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MainModel;
use App\Http\Requests\StoreMain;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkId')->only('show', 'edit', 'destroy', 'delPicture');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listing = MainModel::listing();
        $date = ['title' => 'Сайты-визитки. Главная', 'listing' => $listing];
        return view('main', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('before', MainModel::class);
        $date = ['title' => 'Сайты-визитки. Главная'];
        return view('main/create', $date);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMain $request)
    {
        $this->authorize('before', MainModel::class);
        $picture = null;
        if (!empty($request->picture)) {
            $picture = Storage::disk('public')->url($request->picture->store('main', 'public'));
        }
        MainModel::store($picture, $request->title, $request->news);
        return redirect()->route('index');
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
        $this->authorize('before', MainModel::class);
        $edit = MainModel::edit($id);
        $date = ['title' => 'Сайты-визитки. Главная', 'edit' => $edit];
        return view('main/edit', $date);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMain $request, $id)
    {
        $this->authorize('before', MainModel::class);
        $picture = null;
        if (!empty($request->picture)) {
            $picture = Storage::disk('public')->url($request->picture->store('main', 'public'));
        }
        MainModel::up($id, $picture, $request->title, $request->news);
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('before', MainModel::class);
        MainModel::destr($id);
        return redirect()->route('index');
    }
    
    public function delPicture($id)
    {
        $this->authorize('before', MainModel::class);
        MainModel::delPicture($id);
        return back();
    }
}
