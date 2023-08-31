<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhdStudentMaternityLeave extends Model
{
    use HasFactory;

    protected $table = 'phd_student_maternity_leaves';
    protected $fillable = [
        'stud_id',
        'name',
        'faculty',
        'branch',
        'nodal_center',
        'enrollment_no',
        'enrollment_date',
        'reg_no',
        'reg_date',
        'telephone',
        'address',
        'reason_seeking_leave',
        'rearch_status',
        'leave_from',
        'leave_to',
        'leave_avail',
        'supervisor_status',
        'supervisor_remarks',
        'nodal_status',
        'nodal_remark',
        'vc_status',
        'vc_remark',
        'control_status',
        'control_remarks',
    ];
}
