<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class ResearchworkChangeTitle extends Model
{
    use HasFactory;
    protected $table = 'researchwork_change_title';
    protected $fillable = ['candidate_name','student_id','department_ncr','faculty_of_dept','enrollment_no','registration_no','discipline_specialization','current_title_researchwork','propose_title_researchwork','reason_change_title','scope_of_rearch','student_signature','vice_chancellor','vc_remarks','dsc_approved'];
    protected $hidden = [
        'res_id',
        'created_at',
        'updated_at'
    ];
    public function dscDomainApprovedStatus()
    {
        return $this->hasOne('App\DscDomainApprovedStatus');
    }
    //subash work
    public function student()
    {
        return $this->belongsTo(Student::class,'id');
    }
}
