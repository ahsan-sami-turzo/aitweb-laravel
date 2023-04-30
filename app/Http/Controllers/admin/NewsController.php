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
use App\models\News;
class NewsController extends Controller
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
 
  

  

  public function createNews(){
    $allData = News::all();
    return view('security.admin.news.adminNews', compact('allData'));
}

public function editNews(Request $request){
    $news = News::find($request->id); 
    return response()->json($news);
}


public function saveNews(Request $request){
    //dd($request->all());
    $news         = News::find($request->id);
    if($request->id != null){
      $imageFileName= $news->image;
      
      if($request->hasFile('image')):
          $image    = $request->file('image');
          $filename = $image->getClientOriginalName();
          $EXT      = $image->getClientOriginalExtension();
          $imageFileName = base64_encode($filename);
          $imageFileName = $imageFileName;
          $request->file('image')->move('uploads/images/news/', $imageFileName);
      endif;

        
        $time= Carbon::now();
        $news->title  = $request->title;
        $news->description  = $request->description;
        $news->image         = $imageFileName;
        $news->updated_at     = $time;
    }else{
      $imageFileName="";
      
      if($request->hasFile('image')):
          $image    = $request->file('image');
          $filename = $image->getClientOriginalName();
          $EXT      = $image->getClientOriginalExtension();
          $imageFileName = base64_encode($filename);
          $imageFileName = $imageFileName;
          $request->file('image')->move('uploads/images/news/', $imageFileName);
      endif;
      $news          = new News;
      $time= Carbon::now();
      $news->title  = $request->title;
      $news->description    = $request->description;
      $news->image          = $imageFileName;
      $news->created_at     = $time;
    }
 // dd($product);
  $news->save();
  return redirect('/createNews')->with('success');
}

public function deleteNews (Request $request){
  $data = News::find($request->news_id); 
  $data->delete();
  return response()->json('success');
}
public function activeNews($id){
  DB::table('news')->where('id', $id)->update(['status' => 1]); 
  return redirect('/createNews')->with('success');
}

public function inactiveNews($id){
  DB::table('news')->where('id', $id)->update(['status' => 0]); 
  return redirect('/createNews')->with('success');
}
 

}
