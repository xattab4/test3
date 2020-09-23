<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'sku', 'title', 'image', 'category', 'price'];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['id', 'sku', 'title', 'image', 'category', 'price'];

    /**
     * Get the category of this product
     * 
     * @return array
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    /**
     * Let's format the price into a decent form
     * 
     * @return string
     */
    public function getPriceAttribute($value)
    {
        return number_format($value, 2, ',', ' ');
    }
}
