<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'date',
        'location',
        'price',
        'stock',
    ];

    /**
     * Hubungan Relasi: 1 Event memiliki 1 Kategori (Belongs To)
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}