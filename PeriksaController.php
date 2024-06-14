<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_periksa = Periksa::with('dokter')->get();
        $dokter = Dokter::all();
        $pasien = Pasien::all();

        return view('periksa.index', compact('data_periksa', 'dokter', 'pasien'));
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
        $periksa = new Periksa();
        $periksa->tanggal = $request->tanggal;
        $periksa->berat = $request->berat;
        $periksa->tinggi = $request->tinggi;
        $periksa->tensi = $request->tensi;
        $periksa->keterangan = $request->keterangan;
        $periksa->pasien_id = $request->pasien_id;
        $periksa->dokter_id = $request->dokter_id;
        $periksa->save();

        return redirect('periksa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_periksa = DB::table('periksa')
        ->join('pasien', 'periksa.pasien_id', '=', 'pasien.id')
        ->join('dokter', 'periksa.dokter_id', '=', 'dokter.id')
        ->select('periksa.*', 'pasien.nama as pasien_nama', 'dokter.nama as dokter_nama')
        ->where('periksa.id', $id)
        ->first();

        return view('periksa.detail', compact('data_periksa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $periksa = Periksa::find($id);
        $dokter = Dokter::all();
        $pasien = Pasien::all();

        return view('periksa.edit', compact('periksa', 'dokter', 'pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $periksa = Periksa::find($id);
        $periksa->tanggal = $request->tanggal;
        $periksa->berat = $request->berat;
        $periksa->tinggi = $request->tinggi;
        $periksa->tensi = $request->tensi;
        $periksa->keterangan = $request->keterangan;
        $periksa->pasien_id = $request->pasien_id;
        $periksa->dokter_id = $request->dokter_id;
        $periksa->save();

        return redirect('periksa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $periksa = Periksa::find($id);
        $periksa->delete();

        return redirect('periksa');
    }
}
