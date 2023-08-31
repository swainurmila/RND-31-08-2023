<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeOrderFormationDsc extends Model
{
    use HasFactory;
    protected $table = 'office_order_formation_dsc';
    protected $fillable = ['candidate_name','father_husband_name','corres_address','enrollment_no','department_ncr','dob','category','category_of_studentship','faculty_dept','discipline_specialization','broadarea_of_research_pur','sponsored_student','supervisor_name','supervisor_address','head_of_institute','head_of_dept','expert_member_1','expert_member_2','co_sup_convencer','principal_convencer'];
    protected $hidden = [
        'office_order_id',
        'created_at',
        'updated_at'
    ];
}
