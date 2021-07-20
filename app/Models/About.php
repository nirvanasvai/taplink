<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class About extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','user_id',];

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
