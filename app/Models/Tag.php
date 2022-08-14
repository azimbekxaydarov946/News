<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function news()
    {
        return $this->hasMany(News::class.'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'tag_id');
    }


}
