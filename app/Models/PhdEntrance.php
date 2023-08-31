<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhdEntrance extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'father_husband_name',
        'mobile',
        'email',
        'photo',
        'present_address',
        'permanent_address',
        'selection_ncr',
        'gender',
        'marital_status',
        'dob',
        'category',
        'nationality',
        'mother_tounge',
        'branch',
        'department',
        'dd_no',
        'dd_date',
        'dd_bank',
        'claim_entrance',
        'enclosures',
        'signature',
        'date',
        'place',
        'registration_no',
        'draft_status',
        'status'
    ];
}
