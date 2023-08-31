<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Supervisor;
use NodalCentre;

class ChangeResearchSupervisor extends Model
{
    use HasFactory;
    protected $table    = 'change_research_supervisor_name';
    protected $fillable = ['student_id', 'phd_student_name', 'name_of_ncr', 'registration_no', 'enrollment_no', 'branch_name', 'title_of_phd', 'present_research_supervisor', 'proposed_research_supervisor', 'pres_cosupervisor_name', 'pros_resc_cosupervisor', 'approved_by_bput', 'reason_for_change', 'rd_approved', 'vice_chancellor'];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'id');
    }

    /**
     * Retrives all the details about supervisor
     */
    public function get_present_supervisor_details()
    {
        return $this->hasOne(Supervisor::class, 'id', 'present_research_supervisor');
    }

    /**
     * Retrives all the details about supervisor
     */
    public function get_proposed_supervisor_details()
    {
        return $this->hasOne(Supervisor::class, 'id', 'proposed_research_supervisor');
    }

    /**
     * Retrives all the details about NodalCentre
     */
    public function get_nodal_center_details()
    {
        return $this->hasOne(NodalCentre::class, 'id', 'name_of_ncr');
    }

}
