<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhdSemisterRegistration extends Model
{
    use HasFactory;
    protected $table = 'phd_semister_registration';
    protected $fillable = ['department_ncr','registration_status','dept_name','enrollment_no','enrollment_date','supervisor_name','phd_title','board_area_research','status','credit','course_list'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
