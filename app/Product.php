<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{

    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'category_id', 'description', 'image', 'price'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
