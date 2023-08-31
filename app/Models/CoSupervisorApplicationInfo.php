<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoSupervisorApplicationInfo extends Model
{
    use HasFactory;
    protected $table    = 'cosupervisor_application_info';
    protected $fillable = [
        'sup_id',
        'name',
        'faculty',
        'institution_organisation',
        'present_appointment',
        'dob',
        'marital_status',
        'gender',
        'permanent_address',
        'correspondence_address',
        'nationality',
        'disciline_specialization',
        'email',
        'phone',
        'aadhar_no',
        'title_phd_thesis',
        'recognised_institution',
        'teaching_experience',
        'research_experience',
        'photo',
        'signature',
        'employer_certificate',
        'post_phd_experience',
        'no_papers_journals',
        'application_status',
        'draft_status',
    ];
}
