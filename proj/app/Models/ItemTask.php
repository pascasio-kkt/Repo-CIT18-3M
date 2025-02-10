<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTask extends Model
{
    use HasFactory;
    
    protected $table = 'itemtask';
    
    protected $fillable = [
        'title',
        'description',
        'is_completed'
    ];

    protected $casts = [
        'is_completed' => 'boolean'
    ];
} 