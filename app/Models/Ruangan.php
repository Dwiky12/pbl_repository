<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangans'; // Nama tabel di database

    protected $fillable = [
        'ruangan' // Kolom yang dapat diisi
    ];

    public function ruangKelas() {
        return $this->hasMany(RuangKelas::class);
    }
}