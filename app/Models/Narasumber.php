<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Narasumber extends Model
{
    use HasFactory;

    protected $table = 'narasumbers'; // Nama tabel di database

    protected $fillable = [
        'nama', // Kolom yang dapat diisi
        'asal' // Kolom yang dapat diisi
    ];

    public function seminar() {
        return $this->hasMany(Seminar::class);
    }
}