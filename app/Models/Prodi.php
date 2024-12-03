<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi'; // Nama tabel di database

    protected $fillable = [
        'name' // Kolom yang dapat diisi
    ];

    public function akreditasi() {
        return $this->hasMany(Akkreditasi::class);
    }

    public function visiMisi() {
        return $this->hasMany(VisiMisi::class);
    }

    public function profilProdi() {
        return $this->hasMany(ProfilProdi::class);
    }

    public function dokumenKurikulum() {
        return $this->hasMany(DokumenKurikulum::class);
    }

    public function sop() {
        return $this->hasMany(Sop::class);
    }

    public function tenagaAhli() {
        return $this->hasMany(TenagaAhli::class);
    }

    public function koleksiJurnal() {
        return $this->hasMany(KoleksiJurnal::class);
    }

    public function seminar() {
        return $this->hasMany(Seminar::class);
    }

    public function pengembanganDiri() {
        return $this->hasMany(PengembanganDiri::class);
    }

    public function ruangKelas() {
        return $this->hasMany(RuangKelas::class);
    }

    public function pengabdian() {
        return $this->hasMany(Pengabdian::class);
    }

    public function Kebangsaan() {
        return $this->hasMany(Kebangsaan::class);
    }
}