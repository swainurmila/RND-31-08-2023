<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NodalCentre extends Authenticatable
{
    use HasFactory;
    protected $table = 'nodal_centres';

    protected $fillable = [
        'college_name',
        'email',
        'phone',
        'address',
        'password',
    ];
    protected $hidden = [
        'password',
    ];

    public static function allNodalCentre()
    {
        return NodalCentre::all();
    }
}
