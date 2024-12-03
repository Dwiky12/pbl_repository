<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans'; // Nama tabel di database

    protected $fillable = [
        'kegiatan' // Kolom yang dapat diisi
    ];

    public function seminar() {
        return $this->hasMany(Seminar::class);
    }
}