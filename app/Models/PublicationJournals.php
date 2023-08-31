<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationJournals extends Model
{
    use HasFactory;

    protected $table = 'publication_journals';

    protected $fillable = [
        'sup_id',
        'title',
        'author',
        'name_of_journal',
        'vol_year_page',
        'indexing',
    ];  
}
