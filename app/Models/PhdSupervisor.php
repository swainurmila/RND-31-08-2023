<?php

namespace App\Models;

use CoSupervisor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhdApplicationInfo;
use Supervisor;

class PhdSupervisor extends Model
{
    use HasFactory;
    protected $table = 'phd_supervisors';

    protected $fillable = [
        'supervisor_name',
        'supervisor_email',
        'supervisor_address',
        'supervisor_phone',
        'co_supervisor_name',
        'co_supervisor_email',
        'co_supervisor_address',
        'co_supervisor_phone',
    ];

    /**
     * Method get_supervisor_details
     * Get all the details regarding supervisor
     * @return void
     */
    public function get_supervisor_details()
    {
        return $this->hasOne(Supervisor::class, 'sup_id', 'id');
    }

    /**
     * Method get_co_supervisor_details
     * Get all the details regarding Co Supervisor
     * @return void
     */
    public function get_co_supervisor_details()
    {
        return $this->hasOne(CoSupervisor::class, 'cosup_id', 'id');
    }

    /**
     * Method get_application_details
     * Get all the details regarding PHD Application
     * @return void
     */
    public function get_application_details()
    {
        return $this->hasOne(PhdApplicationInfo::class, 'appl_id', 'id');
    }

}
