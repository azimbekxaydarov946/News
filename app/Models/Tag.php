<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ru',
        'name_uz',
    ];

    public function news()
    {
        return $this->belongsTo(News::class.'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'tag_id');
    }


}
