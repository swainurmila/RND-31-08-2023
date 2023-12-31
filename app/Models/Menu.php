<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'alis_title',
        'parent_id',
        'slug',
        'cust_slug',
        'page_id',
        'sort_order',
        'status',
    ];

    public function childs()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id')->orderBy('sort_order');
    }
}
