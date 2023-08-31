<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoSupervisorEmployment extends Model
{
    use HasFactory;
    protected $table = 'cosupervisor_employments';

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
