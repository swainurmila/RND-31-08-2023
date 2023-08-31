<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\ChangeNodalCenter;
use App\Models\ChangeResearchSupervisor;
use App\Models\PhdApplicationInfo;
use App\Models\ResearchworkChangeTitle;


class Student extends Authenticatable
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'role',
        'first_name',
        'last_name',
        'registration_no',
        'registration_date',
        'father_husband',
        'email ',
        'phone',
        'is_active',
        'phd_registration_no',
    ];
    protected $hidden = [
        'password',
    ];
    
    // subash work
    public function change_nodal_center()
    {   if (session('userdata')['role'] == 'Nodal Centre') {
            return $this->hasMany(ChangeNodalCenter::class,'student_id')->where(['change_nodal_center.rd_approved'=>0]);
        } elseif (session('userdata')['role'] == 'control_cell') {
            return $this->hasMany(ChangeNodalCenter::class,'student_id')->where(['change_nodal_center.rd_approved'=>0]);
        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            return $this->hasMany(ChangeNodalCenter::class,'student_id');
        }
    }
    public function change_research_supervisor_name()
    {   if (session('userdata')['role'] == 'Nodal Centre') {
            return $this->hasMany(ChangeResearchSupervisor::class,'student_id')->where(['change_research_supervisor_name.rd_approved'=>0]);
        }elseif (session('userdata')['role'] == 'control_cell') {
            return $this->hasMany(ChangeResearchSupervisor::class,'student_id')->where(['change_research_supervisor_name.rd_approved'=>0]);
        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            return $this->hasMany(ChangeResearchSupervisor::class,'student_id');
        }
    }
    public function phd_application_info()
    {   if (session('userdata')['role'] == 'Nodal Centre') {
            return $this->hasMany(PhdApplicationInfo::class,'stud_id')->where(['phd_application_info.application_status' => 1]);
        }elseif (session('userdata')['role'] == 'control_cell') {
            return $this->hasMany(PhdApplicationInfo::class,'stud_id')->where(['phd_application_info.application_status' => 2]);
        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            return $this->hasMany(PhdApplicationInfo::class,'stud_id');
        }
    }
    public function researchwork_change_title()
    {   if (session('userdata')['role'] == 'Nodal Centre') {
            return $this->hasMany(ResearchworkChangeTitle::class,'stud_id')->where(['researchwork_change_title.rd_approved' => 0]);
        }elseif (session('userdata')['role'] == 'control_cell') {
            return $this->hasMany(ResearchworkChangeTitle::class,'student_id')->where(['researchwork_change_title.rd_approved' => 2]);
        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            return $this->hasMany(ResearchworkChangeTitle::class,'student_id');
        }
    }
    public function supervior_access(){
        return $this->hasOne(ChangeResearchSupervisor::class,'student_id')->where(['change_research_supervisor_name.dsc_approved' => 0]);
    }
}
