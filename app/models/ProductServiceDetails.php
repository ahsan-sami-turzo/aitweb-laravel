<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductServiceDetails extends Model
{
    protected $table ='product_service_details';
	protected $fillable = [
        'id',
        'service_name',
        'service_desc',
        'product_id',
       
        
        'created_at',
        'updated_at',
	];
}
