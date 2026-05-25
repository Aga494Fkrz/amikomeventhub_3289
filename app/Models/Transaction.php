<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    // Memberitahu Laravel bahwa model ini menggunakan tabel 'partners' hasil buatan SQL-mu
    protected $table = 'partners';

    protected $fillable = [
        'category_id',
        'name',
        'logo',
        'link',
        'description'
    ];

    // Relasi: 1 Partner memiliki 1 Kategori (Belongs To)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}