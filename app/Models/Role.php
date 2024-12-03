<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles'; // Nama tabel di database

    protected $fillable = [
        'nama' // Kolom yang dapat diisi
    ];

    public function user() {
        return $this->hasMany(User::class);
    }
}