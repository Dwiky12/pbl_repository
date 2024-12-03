<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebangsaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokumen', 'id_prodi', 'id_kategori', 'id_tingkat', 'tahun', 'url_penyelenggara'
    ];

    public function dokumen() {
        return $this->belongsTo(Dokumen::class);
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }

    public function tingkat() {
        return $this->belongsTo(Tingkat::class);
    }
}