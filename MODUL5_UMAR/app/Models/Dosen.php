<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = ['kode_dosen', 'nama_dosen', 'nip', 'email', 'no_telepon', '_token'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
