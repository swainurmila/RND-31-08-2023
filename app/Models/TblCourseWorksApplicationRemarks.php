<?php

namespace App\Models;

use CourseWorkSubjects;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhdApplicationInfo;
use Role;

class TblCourseWorksApplicationRemarks extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Method get_application_details
     * @author AlokDas
     * @return void
     */
    public function get_application_details()
    {
        return $this->hasOne(PhdApplicationInfo::class, 'id', 'appl_id');
    }

    /**
     * Method get_coursework_subject_details
     * @author AlokDas
     * @return void
     */
    public function get_coursework_subject_details()
    {
        return $this->hasOne(CourseWorkSubjects::class, 'id', 'course_sub_id');
    }

    /**
     * Method get_roles_details: Will retrieve the role details 
     * @author AlokDas
     * @return void
     */
    public function get_roles_details()
    {
        return $this->hasOne(Role::class, 'id', 'user_type');
    }

}
