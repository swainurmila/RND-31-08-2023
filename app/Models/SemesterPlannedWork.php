<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterPlannedWork extends Model
{
    use HasFactory;

    protected $table = 'semester_planned_works';

    protected $fillable = [
        'prog_repo_id',
        'semester',
        'form_date',
        'to_date',
        'planned_work',
        'actual_work',
    ];
}
