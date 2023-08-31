<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class ChangeNodalCenter extends Model
{
    use HasFactory;
    protected $table = 'change_nodal_center';
    protected $fillable = ['name','student_id','faculty_of','registration_no','enrollment_no','branch_name','topic_of_research','present_status_research','present_nodal_centre','present_supervisor_name','co_supervisor_name','proposed_nodal_centre','proposed_supervisor','proposed_co_supervisor','document','registration_no'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

        
    /**
     * Get student details
     * @return void
     */
    public function student()
    {
        return $this->belongsTo(Student::class,'id', 'student_id');
    }

    
}
