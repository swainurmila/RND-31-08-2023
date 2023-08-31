<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterPublication extends Model
{
    use HasFactory;
    protected $table = 'semester_publications';

    protected $fillable = [
        'prog_repo_id',
        'author',
        'title_paper',
        'journal',
        'vol_no',
        'page_no',
        'attach_file',
    ];
}
