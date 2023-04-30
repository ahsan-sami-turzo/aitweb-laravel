<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table ='our_clients';
	protected $fillable = [
        'title',
        'short_desc',
        'image',
        'status',
        'created_at',
        'updated_at',
	];
}
