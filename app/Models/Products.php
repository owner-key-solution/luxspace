<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function product_gallery()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }
}
