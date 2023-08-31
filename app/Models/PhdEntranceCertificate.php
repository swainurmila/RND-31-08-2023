<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhdEntranceCertificate extends Model
{
    use HasFactory;
    protected $fillable =[
        'stud_id',
        'high_school_certificate',
        'memo_high_school',
        'intermidiate_certificate',
        'memo_intermediate',
        'ug_certificate',
        'memo_ug',
        'pg_mphil_cerficate',
        'memo_pg_mphil',
        'sc_st_certficate',
        'proof_national_eligibility',
        'passport_photographs',
        'adhaar_card',
    ];
}
