<?php

namespace App\Models;

use App\Models\ChangeNodalCenter;
use App\Models\ChangeResearchSupervisor;
use Department;
use DSCExperts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NodalCentre;
use PhdCourseWorks;
use PhdSupervisor;
use TblRemarks;

class PhdApplicationInfo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'phd_application_info';

    protected $fillable = [
        'appl_id',
        'nodal_id',
        'name',
        'name_of_faculty',
        'academic_programme',
        'topic_of_phd_work',
        'ncr_department',
        'father_husband',
        'mother',
        'permannt_address',
        'present_address',
        'enrollment_no',
        'enrollment_date',
        'email',
        'phone',
        'dob',
        'nationality',
        'student_category',
        'category',
        'category_certificate',
        'photo',
        'signature',
        'nodal_remarks',
        'control_cell_remarks',
        'vc_remarks',
        'draft_status',
        'payment_status',
        'stu_payment_status',
        'application_status',
    ];
    // subash code
    public function change_nodal_center()
    {
        return $this->hasMany(ChangeNodalCenter::class, 'student_id');
    }
    public function change_research_supervisor_name()
    {
        return $this->hasMany(ChangeResearchSupervisor::class, 'student_id');
    }

    /**
     * Method get_department_details
     * Relation between phdApplication and departments as academic_programe
     * @author AlokDas
     * @return void
     */
    public function get_department_details()
    {
        return $this->hasOne(Department::class, 'id', 'academic_programme');
    }

    /**
     * Method get_supervisor_details
     * @author AlokDas
     * @return void
     */
    public function get_supervisor_details()
    {
        return $this->belongsTo(PhdSupervisor::class, 'id', 'appl_id');
    }

    /**
     * Method get_nodal_center_details
     * @return void
     * @author AlokDas
     */
    public function get_nodal_center_details()
    {
        return $this->belongsTo(NodalCentre::class, 'nodal_id', 'id');
    }

    /**
     * Method get_domain_experts_details
     * @return void
     * @author AlokDas
     */
    public function get_domain_experts_details()
    {
        return $this->HasMany(DSCExperts::class, 'appl_id', 'id');
    }

    /**
     * Method get_remarks_details
     * @return void
     * @author AlokDas
     */
    public function get_remarks_details()
    {
        return $this->HasOne(TblRemarks::class, 'appl_id', 'id');
    }

    /**
     * Method get_coursework_details
     * @author AlokDas
     * @return void
     */
    public function get_coursework_details()
    {
        return $this->HasOne(PhdCourseWorks::class, 'appl_id', 'id');
    }
    public function get_coursework_remark()
    {
        return $this->HasOne(TblCourseWorksApplicationRemarks::class, 'appl_id', 'id');
    }
    public function get_coursework_subject_details()
    {
        return $this->hasOne(CourseWorkSubjects::class, 'appl_id', 'id');
    }

}
