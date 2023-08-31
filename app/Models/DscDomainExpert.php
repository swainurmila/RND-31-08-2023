<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DscDomainExpert extends Model
{
    use HasFactory;
    protected $table = 'dsc_domain_expert';
    protected $fillable = ['student_name','enrollment_no','name_of_ncr','faculty_of_branch','title_of_rearch_work', 'request_status', 'ncr_remark', 'vc_remark','supervisor_name','designation'];
    protected $hidden = [
        'dsc_id',
        'created_at',
        'updated_at'
    ];
    public function dscDomainApprovedStatus()
    {
        return $this->hasOne('App\DscDomainApprovedStatus');
    }
}
