<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DscDomainApprovedStatus extends Model
{
    use HasFactory;
    protected $table = 'dsc_domain_approval_status';
    protected $fillable = ['dsc_id','approved_status_vc','approved_status_sup'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
