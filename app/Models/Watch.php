<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YSM\Filterable\Concerns\InteractWithFilterable;

class Watch extends Model
{
    use InteractWithFilterable;
    
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        "brand_id",
        "category_id",
    ];
     public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    
}
