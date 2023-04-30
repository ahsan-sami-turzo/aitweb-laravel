<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AboutModel;
use App\models\Gallery;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
   public function index(){
      $aboutUs= AboutModel::all()->last();
      $whyChooseUsInfos = DB::table('why_choose_us')->get();
      $news = DB::table('news')->where('status',1)->orderBy('id', 'DESC')->take(4)->get();
      $clients = DB::table('our_clients')->where('status',1)->get();
      //dd($clients);
      $products = DB::table('products')->where('status',1)->get();
      $services = DB::table('services')->where('status',1)->take(6)->get();
      $featureImages = DB::table('products')->where('status',1)->where('feature_type',1)->orderBy('updated_at', 'DESC')->take(6)->get();
     //dd( $featureImages);
     $gallery = Gallery::where('status',1)->take(6)->get();
      return view('frontEnd.index',[
         'aboutUs' =>  $aboutUs,
         'whyChooseUsInfos' =>  $whyChooseUsInfos,
         'clients'          =>  $clients,
         'news'             =>  $news,
         'products'         =>  $products,
         'services'         =>  $services,
         'featureImages'   => $featureImages,
         'gallery'         => $gallery,
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
