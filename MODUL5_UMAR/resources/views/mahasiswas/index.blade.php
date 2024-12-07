@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mahasiswa</h1>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Dosen Wali</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $index => $mahasiswa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                <td>{{ $mahasiswa->email }}</td>
                <td>{{ $mahasiswa->jurusan }}</td>
                <td>{{ $mahasiswa->dosen->nama_dosen }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
