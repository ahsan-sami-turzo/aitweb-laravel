<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    public $timestamps = false;
    protected $table ='about';
    protected $fillable = [
        'small_title',
        'big_title',
        'short_content',
        'long_content',
        'image'
    ];
}

?>
