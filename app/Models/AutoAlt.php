<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutoAlt extends Model
{
    protected $table = 'autoalts';

    protected $fillable = ['cat_id', 'keywords', 'lang_id'];
}
