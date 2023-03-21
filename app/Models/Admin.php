<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'auth_user';

    // protected $guarded = 'admin';

    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'user_type',
        'publish',
        'last_login',
        'join_date',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
