<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        "passwordinput",
          "searchinput",
          "prependedtext",
          "textinput",
    ];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }
}
