<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perwalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'isi_perwalian', 'semester', 'dosenwali_id'
    ];
}
