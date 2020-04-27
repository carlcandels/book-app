<?php

namespace App\Modules\Author\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasSlug;

    protected $fillable = [
        'name', 'bio', 'slug', 'created_by', 'updated_by'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
	{
    	return 'slug';
	}

}
