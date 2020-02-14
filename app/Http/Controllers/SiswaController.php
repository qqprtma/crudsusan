<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kelas;
use Illuminate\Http\Request;
use DB;
use App\mapel;
class SiswaController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index()
    {
    //$siswa = DB::table('siswas')
    //->join('kelas', 'kelas.id', '=', 'siswas.id_kelas')
    //->select('siswas.id', 'siswas.nis', 'siswas.nama', 'siswas.alamat', 'kelas.kelas')
    //->get();
    //$siswa = Siswa::all();
    $siswa = Siswa::with('kelas', 'mapel')->get();
    return view('siswa.index', compact('siswa'));
    }

    
    public function create()
    {
    //menampilkan halaman FORM INPUT
    $kelas = Kelas::all();
    $mapel = Mapel::all();
    return view('siswa.create', compact('mapel'));
    }

    
    public function store(Request $request)
    {
       $siswa = new Siswa();
       $siswa->nis = $request->nis;
       $siswa->nama = $request->nama;
       $siswa->alamat = $request->alamat;
       $siswa->id_kelas = $request->id_kelas;    
       $siswa->save();
       $siswa->mapel()->attach($request->mapel);
       return redirect()->route('siswa.index');
    }

    
    public function show($id)
    {
       $siswa = Siswa::findOrFail($id);
       return view('siswa.show', compact('siswa'));
    }

   
    public function edit($id)
    {
        $kelas = Kelas::all();
        $siswa = Siswa::findOrFail($id);
        $mapel = Mapel::all();
       return view('siswa.edit', compact('siswa', 'kelas', 'mapel'));
    }

    
    public function update(Request $request, $id)
    {
       $siswa = Siswa::findOrFail($id);
       $siswa->nis = $request->nis;
       $siswa->nama = $request->nama;
       $siswa->alamat = $request->alamat;
       $siswa->id_kelas = $request->id_kelas;  
       $siswa->save();
       $siswa->mapel()->sync($request->mapel);
       return redirect()->route('siswa.index');
    }

    
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id)->delete();
        return redirect()->route('siswa.index');
    }
}