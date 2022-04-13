<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenWali extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen_id', 'mahasiswa_id'
    ];

    public function dosen()
    {
        return $this->belongsTo('App\Models\Dosen', 'dosen_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa', 'mahasiswa_id');
    }

}
