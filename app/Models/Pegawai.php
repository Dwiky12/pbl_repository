<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawais'; // Nama tabel di database

    protected $fillable = [
        'nip', // Kolom yang dapat diisi
        'nama' // Kolom yang dapat diisi
    ];

    public function pengembanganDiri() {
        return $this->hasMany(PengembanganDiri::class);
    }
}