<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Supervisor extends Authenticatable
{
    use HasFactory;

    protected $table = 'supervisors';

    protected $fillable = [
        'role',
        'first_name',
        'last_name',
        'father_husband',
        'email',
        'password',
        'phone',
        'is_active',
        'sup_registration_no',
        
    ];
}
