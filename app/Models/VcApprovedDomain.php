<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VcApprovedDomain extends Model
{
    use HasFactory;
    protected $table = 'vc_approved_domain';
    protected $fillable = ['domain_name'];
    protected $hidden = [
        'appr_domain_id',
        'created_at',
        'updated_at'
    ];
}
