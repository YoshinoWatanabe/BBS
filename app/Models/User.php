<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'password'];

    public static $validateRules = [
        'name' => 'required|string|max:20',
        'password' => 'required|alpha_dash|min:8|max:30'
    ];
}
