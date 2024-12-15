<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenKurikulum extends Model
{
    use HasFactory;

    protected $table = 'dokumen_kurikulums'; 
    protected $primaryKey = 'id_dokumenkurikulum';
    protected $fillable = [ 
        'id_prodi', 
        'nama_kurikulum', 
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