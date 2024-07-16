<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'introduction',
        'price',
        'image',
        'category_id',
        'status_id'
    ];

    // リレーション
    public function category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }
}
