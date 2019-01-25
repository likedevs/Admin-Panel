<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeletedImages extends Model
{
    protected $table = 'aaDeletedImages';
    protected $fillable = ['src', 'product_name'];
}
