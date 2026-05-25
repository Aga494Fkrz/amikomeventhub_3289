<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // 🌟 SEKARANG SUDAH ADA SLUG
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Relasi ke model Partner (Satu kategori bisa dimiliki banyak partner)
     */
    public function partners()
    {
        return $this->hasMany(Partner::class);
    }
}