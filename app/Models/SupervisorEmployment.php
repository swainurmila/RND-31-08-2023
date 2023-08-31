<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorEmployment extends Model
{
    use HasFactory;

    protected $table = 'supervisor_employments';

    protected $fillable = [
        'sup_id',
        'name',
        'address',
        'designation',
        'pay_scale',
        'from',
        'to',
        'type',
        'appointment_date',
    ];  
}
