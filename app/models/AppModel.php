<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AppModel extends Model
{
    public $timestamps = false;
    protected $table ='app_policy';
    protected $fillable = [
        'id',
        'app_name',
        'privacy_policy',
        'tearms_and_condition',
        
         
         'created_at',
         'updated_at'


    ];
}
