<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilProdi extends Model {
    use HasFactory;

    protected $table = 'profil_prodis';
    protected $primaryKey = 'id_profilprodi';
    protected $fillable = [
        'id_prodi',
        'tahun_penggunaan',
        'revisi_ke',
        'file_dokumen',
        'status'
    ];

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}