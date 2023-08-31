<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tbl_remarks extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['appl_id', 'supervisor', 'ncr', 'ncr_overall', 'je', 'je_overall', 'vc', 'vc_overall', 'rnd_cell', 'rnd_cell_overall'];
}
