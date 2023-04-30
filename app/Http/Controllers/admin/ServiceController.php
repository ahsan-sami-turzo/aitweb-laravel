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
use App\models\Service;
class ServiceController extends Controller
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
 
  

  

  public function servicePageEditor(){
    $allData = DB::table('services')->get();
    return view('security.admin.service.adminService', compact('allData'));
}

public function editServiceDetails(Request $request){
    $service = DB::table('services')->where('id', $request->id)->first(); 
    return response()->json($service);
}


public function saveService(Request $request){
    //dd($request->all());
    $service          = Service::find($request->id);
    if($request->id != null){
      $imageFileName= $service->image;
      
      if($request->hasFile('image')):
          $image    = $request->file('image');
          $filename = $image->getClientOriginalName();
          $EXT      = $image->getClientOriginalExtension();
          $imageFileName = base64_encode($filename);
          $imageFileName = $imageFileName;
          $request->file('image')->move('uploads/images/services/', $imageFileName);
          
      endif;

        
        $time= Carbon::now();
        $service->font  = $request->font;
        $service->title  = $request->title;
        $service->shortDescription  = $request->short_description;
        $service->longDescription  = $request->editlongDescription;
        $service->image         = $imageFileName;
    }else{
      $imageFileName="";
      
      if($request->hasFile('image')):
          $image    = $request->file('image');
          $filename = $image->getClientOriginalName();
          $EXT      = $image->getClientOriginalExtension();
          $imageFileName = base64_encode($filename);
          $imageFileName = $imageFileName;
          $request->file('image')->move('uploads/images/services/', $imageFileName);
      endif;
      $service          = new Service();
      //dd($request->all());
      $time= Carbon::now();
      $service->font  = $request->font;
      $service->title  = $request->title;
      $service->shortDescription  = $request->shortDescription;
      $service->longDescription  = $request->longDescription;
      $service->image         = $imageFileName;
      $service->created_at         = $time;
    }
  //dd($service);
  $service->save();
  return redirect('adminServicePageEditor')->with('success');
}

public function deleteServiceDetails(Request $request){
  $data = Service::find($request->id); 
  $data->delete();
  return response()->json('success');
}
public function activeService($id){
  DB::table('services')->where('id', $id)->update(['status' => 1]); 
  return redirect('/adminServicePageEditor')->with('success');
}

public function inActiveService($id){
  DB::table('services')->where('id', $id)->update(['status' => 0]); 
  return redirect('/adminServicePageEditor')->with('success');
}
 

}
