<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'departments_title'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}
