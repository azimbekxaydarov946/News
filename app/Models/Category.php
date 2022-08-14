<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'parent_id', 'status', 'tag_id'
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function contact()
    {
        return $this->hasMany(Contact::class, 'category_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

}
