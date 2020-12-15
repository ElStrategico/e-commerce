<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'main_img', 'price', 'views', 'user_id', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
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
