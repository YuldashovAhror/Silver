<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'location_id',
        'brend_id',
        'product_id',
    ];

    public function brend()
    {
        return $this->belongsTo(Brend::class, 'brend_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
