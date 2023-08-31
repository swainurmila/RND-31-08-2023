<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhdEntranceQualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'stud_id',
        'degree',
        'university_board',
        'year_of_passing',
        'division',
        'precentage',
        'subject',
    ];
}
