<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaAhli extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokumen', 'id_prodi', 'nama_tenagaahli', 'asal_instansi', 'bidang_keahlian', 'tanggal_mulai', 'tanggal_selesai', 'kegiatan'
    ];

    public function dokumen() {
        return $this->belongsTo(Dokumen::class);
    }
    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }
}