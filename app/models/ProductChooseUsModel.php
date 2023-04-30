<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductChooseUsModel extends Model
{
    protected $table ='product_chooseUs';
	protected $fillable = [
        'id',
       'reasons',
        'product_id',
       
        
        'created_at'
        
	];
}
