<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeatures extends Model
{
    protected $table ='features_desc';
	protected $fillable = [
        'id',
        'features_desc',
        'name',
        'product_id',
        'created_at'
    ];
}
