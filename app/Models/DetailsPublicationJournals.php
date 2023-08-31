<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsPublicationJournals extends Model
{
    use HasFactory;

    protected $table = 'details_publication_journals';

    protected $fillable = [
        'title',
        'author',
        'name_of_journal',
        'vol_year_page',
        'indexing',
    ];
}
