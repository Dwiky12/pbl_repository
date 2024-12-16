<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama', 'email', 'password', 'id_role'
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'id_role');
    }
}