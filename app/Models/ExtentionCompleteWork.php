<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtentionCompleteWork extends Model
{
    use HasFactory;
    protected $table = 'extention_complete_works';
    protected $fillable = [
        'stud_id',
        'name',
        'faculty',
        'branch',
        'nodal_center',
        'date_of_commencement',
        'enrollment_no',
        'enrollment_date',
        'reg_no',
        'reg_date',
        'component_not_completed',
        'supervisor_status',
        'supervisor_remarks',
        'nodal_status',
        'nodal_remark',
        'control_status',
        'control_remarks',
        'application_status'
    ];
}
