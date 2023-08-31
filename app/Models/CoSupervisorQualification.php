<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoSupervisorQualification extends Model
{
    use HasFactory;
    protected $table = 'cosupervisor_qualifications';

    protected $fillable = [
        'sup_id',
        'exam',
        'specialization',
        'board_university',
        'year',
        'division',
        'percentage',
        
    ];
}
