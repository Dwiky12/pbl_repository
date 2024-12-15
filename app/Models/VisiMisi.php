<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model {
    use HasFactory;

    protected $table = 'visi_misis';
    protected $primaryKey = 'id_visimisi';
    protected $fillable = [
        'id_prodi',
        'visi',
        'misi',
        'tahun_pemberlakuan',
        'semester',
        'revisi_ke',
        'file_dokumen',
        'status'
    ];

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}