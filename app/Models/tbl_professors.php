<?php

namespace App\Models;

use Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NodalCentre;

class tbl_professors extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'professor_id', 'ncr_id', 'dept_id', 'name', 'designation', 'address', 'contact_no', 'email_id', 'status', 'proffesor_type', 'expert_status', 'created_by',
    ];
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
    ];

    /**
     * returns Nodal center fields
     * @return array
     */
    public function getNcrDetails()
    {
        return $this->hasOne(NodalCentre::class, 'id', 'ncr_id');
    }

    /**
     * Departments details
     * @return array
     */
    public function getDepartmentDetails()
    {
        return $this->hasOne(Department::class, 'id', 'dept_id');
    }
}
