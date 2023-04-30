<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AboutModel;
use App\models\GallaryImageType;
use App\models\Gallery;
use Illuminate\Support\Facades\DB;
class GalleryController extends Controller
{
   public function index(){
      $gallery_img_types = DB::table('gallery_img_type')->get();
      $gallery = Gallery::where('status',1)->take(6)->get();
      return view('frontEnd.gallery.index',[
         'gallery' =>  $gallery,
         'gallery_img_types' => $gallery_img_types
      ]);
   }

   public function allGallery(){
     
      $galleryImageType = GallaryImageType::with(['gallary'])->get()->map(function ($query) {
         $query->setRelation('gallary', $query->gallary->take(4));
         return $query;
      });
     
      return view('frontEnd.gallery.allGallery',[
         'galleryImageType' =>  $galleryImageType,
      ]);
   }
   public function categoryWiseAllImage($id){
      $categoryWiseImage = GallaryImageType::with('gallary')->where('id',$id)->first();
      return view('frontEnd.gallery.categoryWiseImage',[
         'categoryWiseImage' =>  $categoryWiseImage,
      ]);
   }
   public function serviceDetails($id){
      $service = DB::table('services')->where('id',$id)->first();
      $services = DB::table('services')->where('status',1)->get();
      return view('frontEnd.serviceDetails.serviceDetail',[
          'service' => $service,
          'services' => $services
      ]);
  }
}
