<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Pasien;//tambahin ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pasien = DB::table('pasien')->join('kelurahan','pasien.kelurahan_id','=','kelurahan.id')
        ->select('pasien.*','kelurahan.nama as nama_kelurahan')
        ->get();

        $kelurahans = Kelurahan::all();

// buat turunan model pasien
        return view('pasien.index',compact('data_pasien','kelurahans'));
// kirim array data ke view pasien index menggunakan assosiatif array
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pasien = new Pasien();
        $pasien->kode = $request->kode;
        $pasien->nama = $request->nama;
        $pasien->tmp_lahir = $request->tmp_lahir;
        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->gender = $request->gender;
        $pasien->email = $request->email;
        $pasien->alamat = $request->alamat;
        $pasien->kelurahan_id = $request->kelurahan_id;
        $pasien->save();
        return redirect('pasien');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $list= DB::table('pasien')->join('kelurahan','pasien.kelurahan_id','=','kelurahan_id')
        ->select('pasien.*','kelurahan.nama as nama_kelurahan')
        ->get();
        $list_pasien = $list->where('id',$id);
        return view('pasien.detail', compact('list_pasien'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = DB::table('pasien')->where('id',$id)->get();
        $kelurahans = DB::table('kelurahan')->get();
        return view('pasien.edit', compact('pasien','kelurahans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pasien = Pasien::find($request->id);
        $pasien->kode = $request->kode;
        $pasien->nama = $request->nama;
        $pasien->tmp_lahir = $request->tmp_lahir;
        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->gender = $request->gender;
        $pasien->email = $request->email;
        $pasien->alamat = $request->alamat;
        $pasien->kelurahan_id = $request->kelurahan_id;
        $pasien->save();
        return redirect('pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table('pasien')->where('id',$id)->delete();
        return redirect('pasien');

    }
}
