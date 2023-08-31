<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhdApplicationInfo;

class CourseWorkSubjects extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_course_work_subjects';

    protected $fillable = [
        'appl_id',
        'subject_code',
        'course_title',
        'credits',
        'remarks',
    ];
    
    /**
     * Method get_application_details
     * @author AlokDas
     * @return void
     */
    public function get_application_details()
    {
        return $this->hasOne(PhdApplicationInfo::class, 'id', 'appl_id');
    }
}
