<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_answer extends Model
{
    use HasFactory;

    protected $fillable =   ['question','answers','user_id'];
}
