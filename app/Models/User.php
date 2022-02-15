<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'display_picture_link',
        'role_id',
        'gender_id'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function gender() {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }

    public function order() {
        return $this->hasMany(Order::class, 'id', 'account_id');
    }
}
