<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageArticle extends Model
{
    protected $fillable = [
        'article_id',
        'image'
    ];

//    public function image()
//    {
//        return $this->belongsTo(Article::class);
//    }
}
