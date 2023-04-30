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
use App\models\Gallery;
use App\models\GallaryImageType;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\models\Product;
use App\models\Service;

class GalleryController extends Controller
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

     
 
  

  //gallery image type
  public function adminGalleryImageTypePageEditor(){
    $allData = DB::table('gallery_img_type')->get();
    //dd( $allData);
    return view('security.admin.gallery.adminGalleryImageType', [
      'allData' => $allData,
    ]);
  }
  public function saveGalleryImageType(Request $request){
    $imageType = GallaryImageType::find($request->id);
    //dd($imageType);
    if($request->id != null){
        $time= Carbon::now();
        $imageType->name = $request->name;
        $imageType->updated_at     = $time;
        $imageType->save();
    }else{
        $time= Carbon::now();
        $imageType  = new GallaryImageType();
        $imageType->name = $request->name;
        $imageType->created_at     = $time;
        $imageType->save();
    }
  
  return redirect('adminGalleryImageTypePageEditor')->with('success');
  }
  public function editGalleryImageType(Request $request){
    $gallery_img_type = DB::table('gallery_img_type')->where('id',$request->id)->first();
    return response()->json($gallery_img_type);
  }

  public function deleteGalleryImageType(Request $request){
    $gallery_img_type = DB::table('gallery_img_type')->where('id',$request->id)->first();
    $gallery_img_type->delete();
    return response()->json('success');
  }

  public function adminGalleryPageEditor(){
    $allData = Gallery::all();
    $gallery_img_types = DB::table('gallery_img_type')->get();
    //dd( $allData);
    return view('security.admin.gallery.adminGallery', [
      'allData' => $allData,
      'gallery_img_types' => $gallery_img_types,
    ]);
}

public function editGalleryDetails(Request $request){
    $gallery = Gallery::find($request->id); 
    return response()->json($gallery);
}


public function saveGallery(Request $request){
    //dd($request->all());
    $gallery          = Gallery::find($request->id);
    if($request->id != null){
      $imageFileName= $gallery->image;
      
      if($request->hasFile('image')):
          $image    = $request->file('image');
          $filename = $image->getClientOriginalName();
          $EXT      = $image->getClientOriginalExtension();
          $imageFileName = base64_encode($filename);
          $imageFileName = $imageFileName;
          $request->file('image')->move('uploads/images/gallery/', $imageFileName);
          
      endif;

        $time= Carbon::now();
        $gallery->image          = $imageFileName;
        $gallery->img_type_id_fk = $request->img_type_id_fk;
        $gallery->updated_at     = $time;
        $gallery->save();
    }else{
      
      if($request->hasFile('image')):
          $image    = $request->file('image');
          $time= Carbon::now();
          foreach ($image as $files) {
              $filename = $files->getClientOriginalName();
              $EXT      = $files->getClientOriginalExtension();
              $imageFileName = base64_encode($filename);
              $files->move('uploads/images/gallery/', $imageFileName);
              $gallery  = new Gallery();
              $gallery->image         = $imageFileName;
              $gallery->img_type_id_fk = $request->img_type_id_fk;
              $gallery->created_at     = $time;
              $gallery->save();
          }
      endif;
    }
  
  return redirect('adminGalleryPageEditor')->with('success');
}

public function deleteGalleryDetails(Request $request){
  $data = Gallery::find($request->id); 
  $data->delete();
  return response()->json('success');
}
public function activeGallery($id){
  DB::table('gallery')->where('id', $id)->update(['status' => 1]); 
  return redirect('/adminGalleryPageEditor')->with('success');
}

public function inActiveGallery($id){
  DB::table('gallery')->where('id', $id)->update(['status' => 0]); 
  return redirect('/adminGalleryPageEditor')->with('success');
}
 

}
