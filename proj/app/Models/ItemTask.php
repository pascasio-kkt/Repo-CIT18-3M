<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function addItem($record)
    {
        return DB::transaction(function() use ($record) {
            return self::create($record);
        });
    }

    public function updateItem($id, $record)
    {
        return DB::transaction(function() use ($record, $id) {
            return $this->where('id', $id)->update([
                'title' => $record['title'],
                'description' => $record['description'],
                'is_completed' => $record['is_completed'],
            ]);
        });
    }

    public function deleteItem($id)
    {
        return DB::transaction(function() use ($id) {
            return $this->where('id', $id)->delete();
        });
    }
} 