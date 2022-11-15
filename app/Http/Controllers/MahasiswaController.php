<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('npm')->paginate(10);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodis = Prodi::orderBy('nama')->get();
        return view('mahasiswa.create', compact('prodis'));
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
            'prodi_id' => 'required|int',
            'npm' => 'required|int|unique:mahasiswas',
            'thn_masuk' => 'required|int',
            'thn_keluar' => 'nullable|int',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
        ]);
        DB::beginTransaction();
        // simpan data mahasiswa
        Mahasiswa::create($request->post());

        // tambah jumlah mahasiswa di prodi dan fakultas
        // set jml_mhs prodi
        $prod = Prodi::find($request->prodi_id);
        if ($prod) {
            $prod->jml_mhs += 1;
            $prod->save();
        }

        if ($prod->fakultas) {
            // set jml_mhs fakultas
            $fak = $prod->fakultas;
            $fak->jml_mhs += 1;
            $fak->save();
        }

        DB::commit();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::orderBy('nama')->get();
        return view('mahasiswa.edit', compact('prodis', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'prodi_id' => 'required|int',
            'npm' => 'required|int|unique:mahasiswas,npm,' . $mahasiswa->id,
            'thn_masuk' => 'required|int',
            'thn_keluar' => 'nullable|int',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        DB::beginTransaction();
        // hapus jumlah mahasiswa di prodi dan fakultas
        // set jml_mhs prodi 
        $prod = Prodi::find($mahasiswa->prodi_id);
        if ($prod) {
            $prod->jml_mhs -= 1;
            $prod->save();
        }

        if ($prod->fakultas) {
            // set jml_mhs fakultas
            $fak = $prod->fakultas;
            $fak->jml_mhs -= 1;
            $fak->save();
        }

        // simpan data mahasiswa
        $mahasiswa->fill($request->post())->save();

        // tambah jumlah yang baru mahasiswa di prodi dan fakultas
        // set jml_mhs prodi
        $prod = Prodi::find($request->prodi_id);
        if ($prod) {
            $prod->jml_mhs += 1;
            $prod->save();
        }

        if ($prod->fakultas) {
            // set jml_mhs fakultas
            $fak = $prod->fakultas;
            $fak->jml_mhs += 1;
            $fak->save();
        }

        DB::commit();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        DB::beginTransaction();
        // hapus jumlah mahasiswa di prodi dan fakultas
        // set jml_mhs prodi 
        $prod = Prodi::find($mahasiswa->prodi_id);
        if ($prod) {
            $prod->jml_mhs -= 1;
            $prod->save();
        }

        if ($prod->fakultas) {
            // set jml_mhs fakultas
            $fak = $prod->fakultas;
            $fak->jml_mhs -= 1;
            $fak->save();
        }

        // hapus mahasiswa
        $mahasiswa->delete();
        DB::commit();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
    }
}
