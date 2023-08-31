<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;
    protected $table = 'organisations';

    protected $fillable = [
        'organisation_name',
        'designation',
        'duration',
        'natutre_of_job',
    ];
}
