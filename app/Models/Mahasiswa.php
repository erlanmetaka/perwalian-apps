<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'npm', 'jurusan', 'dosen_id'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
