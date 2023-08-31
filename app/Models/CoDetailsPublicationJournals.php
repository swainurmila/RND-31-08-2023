<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoDetailsPublicationJournals extends Model
{
    use HasFactory;
    protected $table = 'codetails_publication_journals';

    protected $fillable = [
        'title',
        'author',
        'name_of_journal',
        'vol_year_page',
        'indexing',
    ];
}
