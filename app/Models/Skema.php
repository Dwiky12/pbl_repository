<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    use HasFactory;

    protected $table = 'skemas'; // Nama tabel di database

    protected $fillable = [
        'skema' // Kolom yang dapat diisi
    ];

    public function seminar() {
        return $this->hasMany(Seminar::class);
    }
}