<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'is_published',
        'sort_order',
        'published_at',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'schema_json',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function sections()
    {
        return $this->hasMany(PageSection::class)->orderBy('sort_order');
    }
}
