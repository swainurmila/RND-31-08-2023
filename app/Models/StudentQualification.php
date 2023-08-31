<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQualification extends Model
{
    use HasFactory;
    protected $table = 'student_qualifications';

    protected $fillable = [
        'exam_passed',
        'Specialization',
        'board_university',
        'year_of_passing',
        'division',
        'percentage',
    ];
}
