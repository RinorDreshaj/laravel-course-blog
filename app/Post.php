<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $appends = ['category_name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    public function getTitleAttribute()
    {
        return ucfirst($this->attributes['title']);
    }
}
