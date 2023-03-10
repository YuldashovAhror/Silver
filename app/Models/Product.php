<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'photos',
        'name_uz',
        'name_ru',
        'price',
        'slug',
    ];

    protected $casts = [
        'photos' => 'array'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
