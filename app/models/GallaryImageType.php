<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class GallaryImageType extends Model
{
    protected $table ='gallery_img_type';
    protected $guarded;

    public function gallary(){
        return $this->hasmany(Gallery::class, 'img_type_id_fk','id');
    }

    
    
}
