<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    // 🌟 DAFTARKAN KOLOM DI SINI AGAR TIDAK MASS ASSIGNMENT ERROR
    protected $fillable = [
        'category_id',
        'name',
        'link',
        'description',
    ];

    /**
     * Hubungan relasi: Satu partner terikat ke sebuah kategori
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}