<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    use HasFactory;

    protected $table = 'tingkats'; // Nama tabel di database

    protected $fillable = [
        'tingkatan' // Kolom yang dapat diisi
    ];

    public function akreditasi() {
        return $this->hasMany(Akreditasi::class);
    }

    public function koleksiJurnal() {
        return $this->hasMany(KoleksiJurnal::class);
    }

    public function seminar() {
        return $this->hasMany(Seminar::class);
    }

    public function pengembanganDiri() {
        return $this->hasMany(PengembanganDiri::class);
    }

    public function kebangsaan() {
        return $this->hasMany(Kebangsaan::class);
    }
}