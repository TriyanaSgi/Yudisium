<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_prodi extends Model
{
    use HasFactory;

    protected $table = 'data_prodi';
    protected $primaryKey = 'id_batch';

    protected $fillable = [
        'nama_prodi',
        'kode_prodi',
        'kode_pt',
        'nama_pt',
        'email',
    ];
}
