<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'sub_title', 'description', 'image', 'date', 'user_id', 'category_id', 'status', 'tag_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'news_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
