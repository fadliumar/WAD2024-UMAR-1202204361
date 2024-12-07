<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswas.show', compact('mahasiswas'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        return view('mahasiswas.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $validateddata = $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim',
            'nama_mahasiswa' => 'required|string',
            'email' => 'required|email|unique:mahasiswas,email',
            'jurusan' => 'required|string',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        Mahasiswa::create($validateddata);
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosens = Dosen::all();
        return view('mahasiswa.edit', compact('mahasiswas', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim,' . $id,
            'nama_mahasiswa' => 'required|string',
            'email' => 'required|email|unique:mahasiswas,email,' . $id,
            'jurusan' => 'required|string',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswas.index')->with('success', 'Data Mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}
