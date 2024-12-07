@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($dosen) ? 'Edit Dosen' : 'Tambah Dosen' }}</h1>
    <form action="{{ isset($dosen) ? route('dosen.update', $dosen->id) : route('dosen.store') }}" method="POST">
        @csrf
        @if (isset($dosen))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="kode_dosen" class="form-label">Kode Dosen</label>
            <input type="text" name="kode_dosen" class="form-control" value="{{ $dosen->kode_dosen ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama</label>
            <input type="text" name="nama_dosen" class="form-control" value="{{ $dosen->nama_dosen ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ $dosen->nip ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $dosen->email ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="{{ $dosen->no_telepon ?? '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

