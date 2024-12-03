<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokumen', 'id_prodi', 'nama_kegiatan', 'tahun', 'semester', 'id_tingkat', 'id_kegiatan', 'id_skema', 'tempat', 'tanggal_mulai', 'tanggal_selesai', 'id_narasumber'
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

    public function jenisKegiatan() {
        return $this->belongsTo(Kegiatan::class);
    }

    public function skema() {
        return $this->belongsTo(Skema::class);
    }

    public function narasumber() {
        return $this->belongsTo(Narasumber::class);
    }
}