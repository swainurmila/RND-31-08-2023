<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenewalRegistration extends Model
{
    use HasFactory;
    protected $table = 'renewal_registrations';
    protected $fillable = ['name','ncr_name','faculty','discipline','enrollment_no', 'enrollment_date', 'regd_no','registration_date','topic','progress','schedule_period','reason_of_non_completion','expected_completion', 'expected_submission'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
