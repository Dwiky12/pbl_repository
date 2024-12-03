<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengabdian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokumen', 'id_prodi', 'nama_kegiatan', 'tahun', 'jumlah_peserta'
    ];

    public function dokumen() {
        return $this->belongsTo(Dokumen::class);
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }
}