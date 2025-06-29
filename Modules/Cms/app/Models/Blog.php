<?php

namespace Modules\Cms\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasTranslations;

    public $translatable = ['title', 'description', 'content', 'keywords'];

    protected $appends = ['image_link'];

    protected $fillable = ['title', 'slug', 'category_id', 'description', 'content', 'image', 'status', 'keywords', 'featured', 'visits'];

    public function scopeFeatured($q)
    {
        $q->where('status', 'Published')->where('featured', 1);
    }

    public function getImageLinkAttribute()
    {
        if ($this->attributes['image']) {
            $path = asset('storage/'.$this->attributes['image']);
        } else {
            $path = asset('images/blank.png');
        }

        return $path;
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
