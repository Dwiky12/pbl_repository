<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokumen', 'id_prodi', 'id_kategorisop', 'nama_sop'
    ];

    public function dokumen() {
        return $this->belongsTo(Dokumen::class);
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function kategoriSOP() {
        return $this->belongsTo(KategoriSOP::class);
    }
}