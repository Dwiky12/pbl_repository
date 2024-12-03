<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisAkreditasi extends Model
{
    use HasFactory;

    protected $table = 'jenis_akreditasis'; // Nama tabel di database

    protected $fillable = [
        'akreditasi' // Nama kolom yang dapat diisi
    ];

    public function akreditasi() {
        return $this->hasMany(Akreditasi::class);
    }
}