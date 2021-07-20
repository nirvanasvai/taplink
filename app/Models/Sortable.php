<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortable extends Model
{
    use HasFactory;

    protected $table = 'sortable';

    protected $fillable = [
        'element_id',
        'position',
        'user_id',
        'type'
    ];
}
