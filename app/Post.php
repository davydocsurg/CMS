<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Post extends Model
{

    use SoftDeletes, HasTrixRichText;

    protected $guarded = [];
    protected $dates = [
        'published_at'
    ];

    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id', 'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * check if post has tag
     *
     * @return boot
     *
     **/
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

     /**
     * check post creator
     *
     * @return boot
     *
     **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if (!$search) {
            return $query->published();
        }

        return $query->published()->where('title', 'LIKE', "%{$search}%");
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }
}
