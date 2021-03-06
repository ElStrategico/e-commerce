<?php

namespace App\Models\Produce;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
