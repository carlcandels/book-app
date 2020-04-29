<?php

namespace App\Modules\Book\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Book extends Model
{
    use HasSlug;

    protected $fillable = [
        'title', 'description', 'image_url', 'published_at','slug', 'created_by', 'updated_by'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
	{
    	return 'slug';
	}
}
