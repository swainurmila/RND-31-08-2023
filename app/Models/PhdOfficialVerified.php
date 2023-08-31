<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhdOfficialVerified extends Model
{
    use HasFactory;
    protected $table = 'phd_official_verified';
    protected $fillable = ['verified','registration_id'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
