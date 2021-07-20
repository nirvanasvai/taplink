<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_carousel',
        'carousel_description',
        'user_id'
    ];

    public function carousel()
    {
        return $this->hasMany(Image::class,'carousel','id');
    }
}
