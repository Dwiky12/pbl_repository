<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriSop extends Model
{
    use HasFactory;

    protected $table = 'kategori_sops'; // Nama tabel di database

    protected $fillable = [
        'nama_kategori' // Kolom yang dapat diisi
    ];

    public function sop() {
        return $this->hasMany(SOP::class);
    }
}