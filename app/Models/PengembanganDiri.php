<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengembanganDiri extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokumen', 'id_prodi', 'nama_kegiatan', 'tahun', 'semester', 'id_pegawai', 'tanggal_mulai', 'tanggal_selesai', 'jenis', 'id_tingkat', 'penyelenggara', 'tempat', 'lama', 'keterangan'
    ];

    public function dokumen() {
        return $this->belongsTo(Dokumen::class);
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function pegawai() {
        return $this->belongsTo(Pegawai::class);
    }

    public function tingkat() {
        return $this->belongsTo(Tingkat::class);
    }
}