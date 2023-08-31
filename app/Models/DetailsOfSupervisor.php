<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsOfSupervisor extends Model
{
    use HasFactory;

    protected $table = 'details_of_supervisors';

    protected $fillable = [
        'sup_id',
        'tot_no_supervising',
        'no_as_supervisor',
        'no_as_cosupervisor',
        'unreserved',
        'sc_st',
        'differently_abled',
        'test_qualified',
        'other',
        'area_of_proposed_research',
        'debarred_from_university',
        'other_relevant_information',
        'mail_id_head',
    ];  
}
