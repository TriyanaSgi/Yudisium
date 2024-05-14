<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batch extends Model
{
    use HasFactory;
    
    protected $table = 'batch';
    protected $primaryKey = 'id_batch';
    
    protected $fillable = [
        'id_batch',
        'nama_mahasiswa',
        'tahun_angkatan',
        'program_studi',
        'status',
        'sks',
        'ipk',
    ];
}
