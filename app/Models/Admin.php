<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
     protected $fillable = ['name', 'profile', 'email', 'password'];
    
    protected $hidden = ['password', 'remember_token'];
}
