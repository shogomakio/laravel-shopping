<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use SoftDeletes;
    
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_id', 'name', 'detail', 'price', 'genre_id', 'brand_id', 'image_path'];

}
