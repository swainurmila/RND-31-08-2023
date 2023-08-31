<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NodalCentre;
use PhdApplicationInfo;

class tbl_dsc_expert extends Model
{
    use HasFactory, SoftDeletes;
    protected $table    = 'tbl_dsc_expert';
    protected $fillable = ['appl_id', 'professor_id', 'status'];

    public function getApplicationDetails()
    {
        return $this->hasOne(PhdApplicationInfo::class, 'id', 'appl_id');
    }

    public function getProfessorDetails()
    {
        return $this->hasOne(NodalCentre::class, 'id', 'ncr_id')->select('id', 'user_table_name');
    }

}
