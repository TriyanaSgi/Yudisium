<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_batch';

    protected $fillable = [
        'id_batch',
        'nim_mhs',
        'nama_mhs',
        'tempat_lahir',
        'tgl_lahir',
        'ipk',
        'tahun_masuk',
        'jurusan',
        'kode-prodi',
        'nama_prodi',
        'asal_pt',
    ];
}
