<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterProgressReport extends Model
{
    use HasFactory;
    protected $table = 'semester_progress_reports';

    protected $fillable = [
        'stud_id',
        'semester',
        'year',
        'date',
        'name',
        'faculty_name',
        'phd_work',
        'nodal_center',
        'enrollment_no',
        'enrollment_date',
        'reg_no',
        'reg_date',
        'supervisor_1',
        'supervisor_2',
        'desc_work',
        'difficulties_encounter',
        'status',
    ];
}
