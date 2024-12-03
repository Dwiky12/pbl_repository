<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe', 'file_path', 'id_user', 'approved'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function akreditasi() {
        return $this->hasOne(Akreditasi::class);
    }

    public function visiMisi() {
        return $this->hasOne(VisiMisi::class);
    }

    public function profilProdi() {
        return $this->hasOne(ProfilProdi::class);
    }

    public function dokumenKurikulum() {
        return $this->hasOne(DokumenKurikulum::class);
    }

    public function sop() {
        return $this->hasOne(Sop::class);
    }

    public function tenagaAhli() {
        return $this->hasOne(TenagaAhli::class);
    }

    public function koleksiJurnal() {
        return $this->hasOne(KoleksiJurnal::class);
    }

    public function seminar() {
        return $this->hasOne(Seminar::class);
    }

    public function pengembanganDiri() {
        return $this->hasOne(PengembanganDiri::class);
    }

    public function ruangKelas() {
        return $this->hasOne(RuangKelas::class);
    }

    public function pengabdian() {
        return $this->hasOne(Pengabdian::class);
    }

    public function kebangsaan() {
        return $this->hasOne(Kebangsaan::class);
    }
}