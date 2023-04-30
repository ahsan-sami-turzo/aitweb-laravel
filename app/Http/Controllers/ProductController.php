<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AddMenuModel;
use App\models\AddSubMenuModel;
use App\models\AddHomeContentModel;
use App\models\SlidersModel;
use App\models\GalleryModel;
use App\models\CatagoryModel;
use App\models\FactsAreaModel;

use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\models\Product;
class ProductController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */

     // WHO WE ARE
 


  public function createProduct(){
  //dd('ok');
    $allData = DB::table('products')->get();
    return view('security.admin.product.adminProduct', compact('allData'));
}

public function editProductDetails(Request $request){
    $product = DB::table('products')->where('id', $request->id)->first(); 
    return response()->json($product);
}


public function saveProduct(Request $request){
  //dd($request->all());
    $product          = Product::find($request->id);
    if($request->id != null){
      $imageFileName= $product->image;
      
      if($request->hasFile('image')):
          $image    = $request->file('image');
          $filename = $image->getClientOriginalName();
          $EXT      = $image->getClientOriginalExtension();
          $imageFileName = base64_encode($filename);
          $imageFileName = $imageFileName;
          $request->file('image')->move('uploads/images/products/', $imageFileName);
      endif;

        
        $time= Carbon::now();
        $product->product_name  = $request->product_name;
        $product->product_desc  = $request->product_desc;
        $product->image         = $imageFileName;
    }else{
      $imageFileName="";
      
      if($request->hasFile('image')):
          $image    = $request->file('image');
          $filename = $image->getClientOriginalName();
          $EXT      = $image->getClientOriginalExtension();
          $imageFileName = base64_encode($filename);
          $imageFileName = $imageFileName;
          $request->file('image')->move('uploads/images/products/', $imageFileName);
      endif;
      $product          = new Product;
      $time= Carbon::now();
      $product->product_name     = $request->product_name;
      $product->product_desc  = $request->product_desc1;
      $product->image            = $imageFileName;
    }
 // dd($product);
  $product->save();
  return redirect('admin/createProduct')->with('success');
}

public function deleteProductDetails(Request $request){
  // dd($request->all());
  $data = Product::find($request->product_id); 
  $data->delete();
  return response()->json('success');
}
public function activeProduct($id){
  DB::table('products')->where('id', $id)->update(['status' => 1]); 
  return redirect('admin/createProduct')->with('success');
}

public function inActiveProduct($id){
  DB::table('products')->where('id', $id)->update(['status' => 0]); 
  return redirect('admin/createProduct')->with('success');
}
 

}
