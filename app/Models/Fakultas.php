<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'jml_mhs'];

    public function prodis()
    {
        return $this->hasMany(Prodi::class, 'fakultas_id', 'id');
    }

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_id', 'id');
    }
}
