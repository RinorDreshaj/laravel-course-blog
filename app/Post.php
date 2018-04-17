<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'category_id', 'media'];

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

    public static function fileUpload($request)
    {
        if(isset($request->file))
        {
            $media_path = $request->file('file')->store('public');
            $image = explode('/', $media_path);
            return $image[count($image) - 1];
        }

        return null;
    }
}
