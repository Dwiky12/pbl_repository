<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuangKelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokumen', 'id_prodi', 'nama_ruangan', 'tahun', 'semester', 'id_ruangan', 'luas', 'daya_tampung', 'status_pemakaian'
    ];

    public function dokumen() {
        return $this->belongsTo(Dokumen::class);
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function jenisRuangan() {
        return $this->belongsTo(JenisRuangan::class);
    }
}