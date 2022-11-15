<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fakultass = Fakultas::orderBy('nama')->paginate(10);
        return view('fakultas.index', compact('fakultass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Fakultas::create($request->post());
        return redirect()->route('fakultas.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function show(Fakultas $fakulta)
    {
        // karena laravel secara default mengubah kata jamak dan di hilangkan 
        // huruf "s" nya maka fakultas diubah dengan sendirinya menjadi fakulta
        $fakultas = $fakulta;
        return view('fakultas.show', compact('fakultas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fakultas $fakulta)
    {
        // karena laravel secara default mengubah kata jamak dan di hilangkan 
        // huruf "s" nya maka fakultas diubah dengan sendirinya menjadi fakulta
        $fakultas = $fakulta;
        return view('fakultas.edit', compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fakultas $fakulta)
    {
        // karena laravel secara default mengubah kata jamak dan di hilangkan 
        // huruf "s" nya maka fakultas diubah dengan sendirinya menjadi fakulta
        $request->validate([
            'nama' => 'required',
        ]);
        $fakultas = $fakulta;
        $fakultas->fill($request->post())->save();
        return redirect()->route('fakultas.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fakultas $fakulta)
    {
        // karena laravel secara default mengubah kata jamak dan di hilangkan 
        // huruf "s" nya maka fakultas diubah dengan sendirinya menjadi fakulta
        $fakultas = $fakulta;
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success', 'Data berhasil dihapus');
    }
}
