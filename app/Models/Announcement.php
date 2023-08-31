<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'announcements_title'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}
