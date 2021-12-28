<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

    public function product_categories()
    {
        return $this->hasMany(ProductCategory::class, 'product_id');
    }
}
