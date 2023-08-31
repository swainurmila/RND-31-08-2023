<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhdApplicationConfig extends Model
{
    use HasFactory;
    protected $table = 'phd_application_configs';

    protected $fillable = [
        'appl_title',
        'from_date',
        'to_date',
        'application_fee',
        'appl_type',
        'active',
    ];

    public function applicationDetails($type)
    {
        return PhdApplicationConfig::where('appl_type',$type)->first();
    }
}
