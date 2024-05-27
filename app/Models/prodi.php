<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    use HasFactory;

    protected $table = 'data_prodi';
    protected $primaryKey = 'kode_prodi';

    protected $fillable = [
        'nama_prodi',
        'kode_prodi',
        'kode_pt',
        'nama_pt',
    ];
}
