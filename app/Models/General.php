<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $table = 'general_info';

    protected $fillable = ['homephone', 'mobilephone', 'email', 'skype', 'address', 'facebook', 'odnoklassniki', 'gmail', 'youtube', 'maxaddress'];
}
