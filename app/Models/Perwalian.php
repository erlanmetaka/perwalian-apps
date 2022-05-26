<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perwalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_perwalian' ,'judul', 'isi_perwalian', 'semester', 'dosenwali_id', 'tahun_ajaran'
    ];

    public function dosenWali()
    {
        return $this->belongsTo('App\Models\DosenWali', 'dosenwali_id');
    }
}
