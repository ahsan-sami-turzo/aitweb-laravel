<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table ='news';
	protected $fillable = [
        'title',
        'short_description',
        'shortDescription',
        'long_description',
        'image',
        'status',
        'created_at',
        'updated_at',
	];
}
