<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Description extends Model
{
    use HasFactory;
    protected $fillable = ['description','user_id'];

//    public static function boot()
//    {
//        parent::boot();
//
//        self::created(function ($model) {
//
//            $model->sortby = Str::slug($model->id . $model->id);
//            $model->save();
//        });
//    }
}
