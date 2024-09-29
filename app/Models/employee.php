<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class employee extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name','email','password','details','photo'];

    protected $hidden = ['password', 'remember_token'];
}
