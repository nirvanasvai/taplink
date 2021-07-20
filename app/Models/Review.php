<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['name','review','user_id','author_id'];

    public function images()
    {
        return $this->hasOne(Image::class,'review_id','id');
    }
    public function videos()
    {
        return $this->hasOne(Video::class,'review_id','id');
    }
}
