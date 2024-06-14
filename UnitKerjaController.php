<?php

namespace App\Http\Controllers;

use App\Models\Unit_Kerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_unit_kerja = Unit_Kerja::all();
        return view('unit_kerja.index', ['data_unit_kerja' => $data_unit_kerja]);
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
        $unit_kerja = new Unit_Kerja;
        $unit_kerja->nama = $request->nama;
        $unit_kerja->save();
        return redirect('unit_kerja');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unit_kerja = Unit_Kerja::findOrFail($id);
        return view('unit_kerja.edit', compact('unit_kerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unit_kerja = Unit_Kerja::findOrFail($id);
        $unit_kerja->nama = $request->nama;
        $unit_kerja->save();
        return redirect('unit_kerja');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit_kerja = Unit_Kerja::findOrFail($id);
        $unit_kerja->delete();
        return redirect('unit_kerja');
    }
}
