@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center vh-100 bg-light">
    <h1 class="mb-4">Selamat Datang di Sistem Manajemen Data</h1>
    <p class="mb-4">Silakan pilih data yang ingin Anda lihat:</p>
    <div>
        <a href="{{ route('dosen.index') }}" class="btn btn-primary btn-lg mx-2">Data Dosen</a>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary btn-lg mx-2">Data Mahasiswa</a>
    </div>
</div>
@endsection