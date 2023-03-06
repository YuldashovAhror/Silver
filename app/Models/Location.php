<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_uz',
        'name_ru',
    ];
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
