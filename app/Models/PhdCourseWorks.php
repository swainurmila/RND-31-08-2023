<?php

namespace App\Models;

use CoSupervisor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhdApplicationInfo;
use Supervisor;

class PhdCourseWorks extends Model
{
    use HasFactory, SoftDeletes;
    protected $table    = 'tbl_phd_courseworks';
    protected $fillable = [
        'appl_id',
        'work_brief_desc',
        'equip_brief_desc',
        'residence_plan_desc',
        'student_signature',
        'date_of_commence',
        'sup_comment',
        'sup_signature',
        'sup_id',
        'co_sup_signature',
        'cosup_id',
        'created_at'
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

    /**
     * Method get_supervisor_details
     * @author AlokDas
     * @return void
     */
    public function get_supervisor_details()
    {
        return $this->hasOne(Supervisor::class, 'id', 'sup_id');
    }

    /**
     * Method get_co_supervisor_details
     * @author AlokDas
     * @return void
     */
    public function get_co_supervisor_details()
    {
        return $this->hasOne(CoSupervisor::class, 'id', 'cosup_id');
    }
}
