<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursework extends Model
{
    use HasFactory;
    protected $table = 'coursework';
    protected $fillable = ['course_name','dept_id','credit'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
