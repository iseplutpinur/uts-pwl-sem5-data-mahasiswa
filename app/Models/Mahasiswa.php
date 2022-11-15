<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['prodi_id', 'npm', 'nama', 'thn_masuk', 'thn_keluar', 'jenis_kelamin', 'tanggal_lahir', 'alamat'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
