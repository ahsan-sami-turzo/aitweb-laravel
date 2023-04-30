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
use App\models\ProductServiceDetails;
use App\models\ProductFeatures;
use App\models\ProductChooseUsModel;
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
    //dd($allData);
    $services=DB::table('products')->where('product_service_id',1)->get();
    foreach($services as $service)
    {
      //dd($data);
    $productServices= DB::table('product_service_details')->where('product_id',$service->id)->get();
    }
    //dd( $productServices);
    
    $features = DB::table('product_main_feature')->get();
    $pfeatures= DB::table('features_desc')->get();
    $positions=DB::table('product_logo_position')->get();
    return view('security.admin.product.adminProduct', [
      'allData' => $allData,
      'features' =>  $features,
      'pfeatures' => $pfeatures,
      'productServices'=>$productServices,
      'positions'=>$positions
    ]);
}

public function editProductDetails(Request $request){
 
    $product = Product::where('id', $request->id)->first(); 
    
    if($product->product_service_id==1){
    $services= DB::table('product_service_details')->where('product_id',$product->id)->get(); 
    
    }
    else{
      $services=[];
    }
    
    if($product->feature_id==1){
    $productFeatures= DB::table('features_desc')->where('product_id', $product->id)->get(); 
    //dd( $request->id, $service, $productFeatures );
    }
    else{
      $productFeatures=[];
    }
    
    if($product->chooseUs_id==1){
      $chooses= DB::table('product_chooseUs')->where('product_id', $product->id)->get(); 
      //dd( $request->id, $service, $productFeatures );
      }
      else{
        $chooses=[];
      }
      if($product->image_logo!=null)
      {
        $logo= DB::table('product_logo_position')->where('id',$product->logo_position)->value('name');
      }else{
        $logo = '';
      }
  
      //dd($product);
    return response()->json([
      'product'=>$product,
      'services'=>$services,
      'productFeatures'=>$productFeatures,
      'chooses'=>$chooses,
      'logo'=>$logo
    ]);
  
}


public function saveProduct(Request $request){
  //dd($request->all());
    $product          = Product::find($request->id);
    
    if($request->id != null){
      $imageFileName= $product->image;
      $imageFileName1= $product->image_logo;
      
      if($request->hasFile('image')):
          $image    = $request->file('image');
          $filename = $image->getClientOriginalName();
          $EXT      = $image->getClientOriginalExtension();
          $imageFileName = base64_encode($filename);
          $imageFileName = $imageFileName;
          $request->file('image')->move('uploads/images/products/', $imageFileName);
      endif;
        
        if($request->hasFile('image1')):
          $image1    = $request->file('image1');
          $filename1 = $image1->getClientOriginalName();
          $EXT1      = $image1->getClientOriginalExtension();
          $imageFileName1 = base64_encode($filename1);
          $imageFileName1 = $imageFileName1;
          $request->file('image1')->move('uploads/images/products/', $imageFileName1);
      endif;
        $time= Carbon::now();
        $product->product_name  = $request->product_name;
        $product->product_desc  = $request->product_desc;
        $product->image         = $imageFileName;
        $product->image_logo         = $imageFileName1;
        $product->logo_position         = $request->position_id;
        $product->product_service_id= $request->serviceId;
      $product->feature_id= $request->featureId;
      $product->chooseUs_id= $request->chooseId;
      
        if($request->ftId==1)
        {
          $product->feature_type=1;
        }
        else{
        $product->feature_type=2;
        }
        $product->save();
         
        $services= DB::table('product_service_details')->where('product_id', $request->id)->get(); 
      
      foreach($services as $service){
        ProductServiceDetails::find($service->id)->delete();
      }
        if($request->serviceId==1)
      
        {
          $idCount = count($request->service_name);
          
          //dd($idCount);
          for ($i=0; $i < $idCount; $i++){
  
            $service             = new ProductServiceDetails();
            $imageFileName2= "";
          
            if($request->service_name[$i] != null){
              //dd($request->hasFile('image2'));
              if($request->hasFile('image2')):
                
                  $image2    = $request->file('image2');
                  //dd($image2);
                  $filename2 = $image2[$i]->getClientOriginalName();
                  $EXT2      = $image2[$i]->getClientOriginalExtension();
                  $imageFileName2 = base64_encode($filename2);
                  $imageFileName2 = $imageFileName2;
                  $image2[$i]->move('uploads/images/products_service/', $imageFileName2);
              endif;
              $service->service_name= $request->service_name[$i];
              //dd( $service->service_name);
              $service->service_desc= $request->service_desc[$i];
              $service->product_id= $product->id;
              $service->image= $imageFileName2;
              $service->created_at=  Carbon::now();
              $service->save();
              //dd($service);
            
          
            }
        } 
        //dd($service);
      }
        
      $productFeatures= DB::table('features_desc')->where('product_id', $request->id)->get();  
    
      foreach($productFeatures as $productFeature){
        ProductFeatures::find($productFeature->id)->delete();
      }
        if($request->featureId==1)
        
        {
         
         
        $fCount = count($request->features_name);
         //dd( $fCount) ;
          
        for ($i=0; $i < $fCount; $i++){
        $features=  new ProductFeatures;
        if($request->features_name[$i] != null){

        $features->name= $request->features_name[$i];
        //dd($features->name);
        $features->features_desc= $request->features_desc[$i];
        $features->product_id= $product->id;
        
        $features->created_at=  Carbon::now();
       
        $features->save();
        //dd($features);
        }
      }
      }
      
      $chooses= DB::table('product_chooseUs')->where('product_id', $request->id)->get();

  foreach( $chooses as  $choose){
    ProductChooseUsModel::find($choose->id)->delete();
  }
      if($request->chooseId==1)
        
      {
       
        
        $Count = count($request->reasons);
        
        
        for ($i=0; $i < $Count; $i++){
          $chooseUs             = new ProductChooseUsModel();
          if($request->reasons[$i] != null){
          $chooseUs->reasons= $request->reasons[$i];
         
          $chooseUs->product_id= $product->id;
          
          $chooseUs->created_at=  Carbon::now();
          $chooseUs->save();
        }
      }
        
      } 
    }else{
      $imageFileName="";
      $imageFileName1="";
      
      if($request->hasFile('image')):
          $image    = $request->file('image');
          $filename = $image->getClientOriginalName();
          $EXT      = $image->getClientOriginalExtension();
          $imageFileName = base64_encode($filename);
          $imageFileName = $imageFileName;
          $request->file('image')->move('uploads/images/products/', $imageFileName);
      endif;
      if($request->hasFile('image1')):
        $image1    = $request->file('image1');
        $filename1 = $image1->getClientOriginalName();
        $EXT1      = $image1->getClientOriginalExtension();
        $imageFileName1 = base64_encode($filename1);
        $imageFileName1 = $imageFileName1;
        $request->file('image1')->move('uploads/images/products/', $imageFileName1);
    endif;
      $product          = new Product;
      $time= Carbon::now();
      $product->product_name     = $request->product_name;
      $product->product_desc  = $request->product_desc;
      $product->image            = $imageFileName;
      $product->image_logo            = $imageFileName1;
      $product->product_service_id= $request->serviceId;
      $product->feature_id= $request->featureId;
      $product->chooseUs_id= $request->chooseId;
      $product->logo_position         = $request->position_id;
      if($request->ftId==1)
        {
          //dd('ok');
          $product->feature_type=1;
        }
        else{
        $product->feature_type=2;
        }
      $product->save();
      //dd($product);
      
      if($request->serviceId==1)
      
      {
        $idCount = count($request->service_name);
        
        //dd($idCount);
        for ($i=0; $i < $idCount; $i++){

          $service             = new ProductServiceDetails();
          $imageFileName2= "";
        
           //dd( $imageFileName2);
          if($request->hasFile('image2')):
            //dd('ok');
              $image2    = $request->file('image2');
              $filename2 = $image2[$i]->getClientOriginalName();
              $EXT2      = $image2[$i]->getClientOriginalExtension();
              $imageFileName2 = base64_encode($filename2);
              $imageFileName2 = $imageFileName2;
              $image2[$i]->move('uploads/images/products_service/', $imageFileName2);
          endif;
          $service->service_name= $request->service_name[$i];
          //dd( $service->service_name);
          $service->service_desc= $request->service_desc[$i];
          $service->product_id= $product->id;
          $service->image= $imageFileName2;
          $service->created_at=  Carbon::now();
          $service->save();
          
        
        
      } 
      //dd($service);
    }
    
      if($request->featureId==1)
      
      {
       
       
      $fCount = count($request->features_name);
       //dd( $fCount) ;
        
      for ($i=0; $i < $fCount; $i++){
      $features=  new ProductFeatures;
      $features->name= $request->features_name[$i];
      $features->features_desc= $request->features_desc[$i];
      $features->product_id= $product->id;
      
      $features->created_at=  Carbon::now();
     
      $features->save();
      }
    }
    
    
    if($request->chooseId==1)
      
    {
     
      
      $Count = count($request->reasons);
      
      
      for ($i=0; $i < $Count; $i++){
        $chooseUs             = new ProductChooseUsModel();
        $chooseUs->reasons= $request->reasons[$i];
       
        $chooseUs->product_id= $product->id;
        
        $chooseUs->created_at=  Carbon::now();
        $chooseUs->save();
      }
      
    } 
    //dd($chooseUs);


              

  }
 
  return redirect('admin/createProduct')->with('success');
}

public function deleteProductDetails(Request $request){
   //dd($request->all());
  $data = Product::find($request->product_id);
  //dd($data);
  $services= DB::table('product_service_details')->where('product_id', $data->id)->get(); 
  //dd($services);
  $productFeatures= DB::table('features_desc')->where('product_id', $data->id)->get();  
  foreach($services as $service){
    ProductServiceDetails::find($service->id)->delete();
  }
  foreach($productFeatures as $productFeature){
    ProductFeatures::find($productFeature->id)->delete();
  }
  $chooses= DB::table('product_chooseUs')->where('product_id', $data->id)->get();

  foreach( $chooses as  $choose){
    ProductChooseUsModel::find($choose->id)->delete();
  }
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
