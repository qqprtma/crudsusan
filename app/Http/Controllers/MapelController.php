<?php

namespace App\Http\Controllers;

use App\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index()
    {
    $mapel = Mapel::all();
     return view('mapel.index', compact('mapel'));
    }

    
    public function create()
    {
    //menampilkan halaman FORM INPUT
    return view('mapel.create');
    }

    
    public function store(Request $request)
    {
       $mapel = new Mapel();
       $mapel->nama = $request->nama;
       $mapel->save();
       return redirect()->route('mapel.index');
    }

    
    public function show($id)
    {
       $mapel = Mapel::findOrFail($id);
       return view('mapel.show', compact('mapel'));
    }

   
    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
       return view('mapel.edit', compact('mapel'));
    }

    
    public function update(Request $request, $id)
    {
       $mapel = Mapel::findOrFail($id);
       $mapel->nama = $request->nama;
       $mapel->save();
       return redirect()->route('mapel.index');
    }

    
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id)->delete();
        return redirect()->route('mapel.index');
    }
}
