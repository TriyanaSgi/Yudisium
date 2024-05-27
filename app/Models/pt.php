<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pt extends Model
{
    use HasFactory;

    protected $table = 'data_pt';
    protected $primaryKey = 'kd_pt';

    protected $fillable = [
        'kd_pt',
        'nama_pt',
    ];
}
