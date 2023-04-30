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
class WhyChooseController extends Controller
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
  public function createWhyChooseUs(){
    $allData = DB::table('why_choose_us')->where('softDel', 0)->get();
    return view('security.admin.whyChoosePageEditor.createWhyChooseUs', compact('allData'));
  }
  public function editWhyChooseUsDetails(Request $request){
    $data = DB::table('why_choose_us')->where('id', $request->id)->first();
    return response()->json($data);
  }
  public function deleteWhyChooseUs(Request $request){
    DB::table('why_choose_us')->where('id', $request->id)->update(['softDel' => 1]); 
    return redirect('admin/createWhoWeAre')->with('success');
  }

  public function saveWhyChooseUs(Request $data){
    //dd($data);
    DB::beginTransaction();
    try{

        if($data->id){
            // dd($data->id);
          DB::table('why_choose_us')->where('id', $data->id)->update([
            'choose_title' => $data['choose_title'],
            'choose_color' => $data['choose_color'],
            'choose_details' => $data['choose_details']   
          ]);          
        }
        else{
          DB::table('why_choose_us')->insert( array (
            'choose_title' => $data['choose_title'],
            'choose_color' => $data['choose_color'],
            'choose_details' => $data['choose_details']  
          ));
        }

        DB::commit();
        return redirect('admin/createWhyChooseUs')->with('success');
    }
    catch(\Exception $exception){
        DB::rollback();
        $data = array(
            'responseTitle'  => 'Warning!',
            'responseText'   => $exception->getMessage()
        );
        return response()->json($data);
    }
  }

  public function createProduct(){
    //dd('ok');
    $allData = DB::table('why_choose_us')->where('softDel', 0)->get();
    return view('security.admin.product.adminProduct', compact('allData'));
}

public function deleteProduct(Request $request){
    DB::table('programs')->where('id', $request->id)->update(['softDel' => 1]); 
    return redirect('admin/createProduct')->with('success');
}

public function saveProduct(Request $data){
    dd($data);
    DB::beginTransaction();
    try{
        DB::table('programs')->insert( array (
        'program_name' => $data['program_name'],
        'program_type' => $data['program_type'],
        'program_host' => $data['program_host'],
        ));

        DB::commit();
        return redirect('admin/createProduct')->with('success');
    }
    catch(\Exception $exception){
        DB::rollback();
        $data = array(
            'responseTitle'  => 'Warning!',
            'responseText'   => $exception->getMessage()
        );
        return response()->json($data);
    }
}

 

}
