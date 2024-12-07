<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{

    public function index()
    {
        $dosens = Dosen::all();
        return view('dosens.index', compact('dosens'));
    }

    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosens.show', compact('dosen'));
    }

    public function create()
    {
        return view('dosens.create');
    }

    public function store(Request $request)
    {
        $validateddata = $request->validate([
            'kode_dosen' => 'required|string|size:3|unique:dosens,kode_dosen',
            'nama_dosen' => 'required|string',
            'nip' => 'required|string|unique:dosens,nip',
            'email' => 'required|email|unique:dosens,email',
            'no_telepon' => 'nullable|string',
        ]);

        Dosen::create($validateddata);
        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosens'));
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'kode_dosen' => 'required|string|size:3|unique:dosens,kode_dosen,' . $id,
            'nama_dosen' => 'required|string',
            'nip' => 'required|string|unique:dosens,nip,' . $id,
            'email' => 'required|email|unique:dosens,email,' . $id,
            'no_telepon' => 'nullable|string',
        ]);

        $dosen->update($request->all());
        return redirect()->route('dosens.index')->with('success', 'Data Dosen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosens.index')->with('success', 'Data Dosen berhasil dihapus.');
    }
}
