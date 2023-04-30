<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table ='services';
	protected $fillable = [
        'font',
        'title',
        'shortDescription',
        'longDescription',
        'image',
        'status',
        'created_at',
        'updated_at',
	];
}
