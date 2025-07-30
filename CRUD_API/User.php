<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'FirstName',
        'LastName',
        'Email',
        'PasswordHash',
        'Role',
        'Department',
        'IsActive',
        'ProfileImageUrl',
        'LastSeenDate',
        'CreatedDate',
        'UpdatedDate',
    ];

    protected $hidden = [
        'PasswordHash',
    ];
}
