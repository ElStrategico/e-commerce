<?php

namespace App\Models\Produce;

use App\Models\Produce\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'main_img', 'price', 'views', 'user_id', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function models()
    {
        return $this->hasMany(ProductModel::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function videos()
    {
        return $this->hasMany(ProductVideo::class);
    }

    /**
     * @return bool
     */
    public function increaseViews()
    {
        $this->views++;

        return $this->save();
    }
}
