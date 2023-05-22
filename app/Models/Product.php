<?php

namespace App\Models;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];


    // product có n image
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    // 1 prod thuộc 1 cate
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // 1 prod có n màu
    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }
}
