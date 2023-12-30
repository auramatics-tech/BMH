<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class News extends Model
{  
    protected $table = 'news';
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'type',
        'is_tranding',
        'active',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}