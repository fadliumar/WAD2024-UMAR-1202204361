@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($mahasiswa) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa' }}</h1>
    <form action="{{ isset($mahasiswa) ? route('mahasiswa.update', $mahasiswa->id) : route('mahasiswa.store') }}" method="POST">
        @csrf
        @if (isset($mahasiswa))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_mahasiswa" class="form-label">Nama</label>
            <input type="text" name="nama_mahasiswa" class="form-control" value="{{ $mahasiswa->nama_mahasiswa ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $mahasiswa->email ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" value="{{ $mahasiswa->jurusan ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen Wali</label>
            <select name="dosen_id" class="form-control" required>
                <option value="">Pilih Dosen</option>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->id }}" {{ isset($mahasiswa) && $mahasiswa->dosen_id == $dosen->id ? 'selected' : '' }}>
                        {{ $dosen->nama_dosen }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
