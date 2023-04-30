<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailsController extends Controller
{
    public function index($id){
        
        $productlist = DB::table('products')->where('id',$id)->first();
       if( $productlist){
            $services= DB::table('product_service_details')->where('product_id',$productlist->id)->get();
            $activeFeature= DB::table('features_desc')->where('product_id',$productlist->id)->first();
            $chooses= DB::table('product_chooseUs')->where('product_id',$productlist->id)->get();
            if(is_null($activeFeature)){
                $featuresDesc = null;
            }else{
                $featuresDesc= DB::table('features_desc')->where('product_id',$productlist->id)->where('id', '!=' , $activeFeature->id)->get();
            }
       }else{
           $services=[];
           $activeFeature=[];
           $chooses=[];
           $featuresDesc=[];
       }

        //dd($productlist);
        
        $products = DB::table('products')->where('status',1)->get();
      
       
        //dd( $featuresDesc);
        $features=DB::table('product_main_feature')->get();
      
        return view('frontEnd.productDetails.productDetail',[
            'productlist' => $productlist,
            'products' => $products,
            'services'=> $services,
            'featuresDesc'=>$featuresDesc,
            'features'=>$features,
            'activeFeature'=>$activeFeature,
            'chooses'=> $chooses
        ]);
            
    }
}
