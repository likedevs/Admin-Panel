<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetProducts extends Model
{
    protected $table = 'set_product';

    protected $fillable = [
        'set_id', 'product_id', 'src',
    ];

    // public function setProduct($productId)
    // {
    //     return $this->hasOne(Set::class);
    // }
    //
    // public function translation($lang = 1)
    // {
    //     return $this->hasOne(SetTranslation::class, 'set_id')->where('lang_id', $lang);
    // }
}
