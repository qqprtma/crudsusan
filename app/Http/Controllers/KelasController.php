<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index()
    {
     $kelas = Kelas::all();
     return view('kelas.index', compact('kelas'));
    }

    
    public function create()
    {
    //menampilkan halaman FORM INPUT
    return view('kelas.create');
    }

    
    public function store(Request $request)
    {
       $kelas = new Kelas();
       $kelas->nama = $request->nama;
       $kelas->save();
       return redirect()->route('kelas.index');
    }

    
    public function show($id)
    {
       $kelas = Kelas::findOrFail($id);
       return view('kelas.show', compact('kelas'));
    }

   
    public function edit($id)
    {
       $kelas = Kelas::findOrFail($id);
       return view('kelas.edit', compact('kelas'));
    }

   
    public function update(Request $request, $id)
    {
       $kelas = Kelas::findOrFail($id);
       $kelas->nama = $request->nama;
       $kelas->save();
       return redirect()->route('kelas.index');
    }

   
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id)->delete();
        return redirect()->route('kelas.index');
    }
}
