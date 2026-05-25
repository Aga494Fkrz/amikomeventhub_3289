<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function partners()
{
    return $this->hasMany(Partner::class);
}
}
