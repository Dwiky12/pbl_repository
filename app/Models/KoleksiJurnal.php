<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiJurnal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokumen', 'id_prodi', 'nama_jurnal', 'tahun', 'semester', 'id_tingkat', 'jenis_jurnal', 'terindex', 'terindex_lainnya', 'penerbit', 'volume', 'jumlah_eksemplar', 'deskripsi'
    ];

    public function dokumen() {
        return $this->belongsTo(Dokumen::class);
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function tingkat() {
        return $this->belongsTo(Tingkat::class);
    }
}