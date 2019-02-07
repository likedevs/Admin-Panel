<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetProductImage extends Model
{
    protected $table = 'set_product_images';

    protected $fillable = [
        'set_id', 'product_id', 'image'
    ];


}
