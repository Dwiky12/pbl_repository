<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris'; // Nama tabel di database

    protected $fillable = [
        'nama_kategori' // Kolom yang dapat diisi
    ];

    public function kebangsaan() {
        return $this->hasMany(Kebangsaan::class);
    }
}