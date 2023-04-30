<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AppModel;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppPrivacyPolicyController extends Controller
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
    public function indexApp(){
      $app=AppModel::orderby('id','asc')->get();
      return view('security.admin.app.manage' , compact('app'));

    }

    public function createApp(){
      return view('security.admin.app.create');
     
    }
    public function editApp($id){
     // dd($request->all());

     $ap =AppModel::find($id);
        if( !is_null($ap))
        {
        return view('security.admin.app.edit',compact('ap'));
        }
    }
    public function saveApp(Request $request){
      //($request->all())
      $app  = new AppModel;
      $time = Carbon::now();
      $app->app_name  = $request->app_name;
      $app->privacy_policy  = $request->privacy_policy;
      $app->tearms_and_condition = $request->tearms_and_condition;
      $app->save();
      return redirect('/admin/ManageAppPrivacyPolicy')->with('success');
          
    }
    public function updateApp(Request $request, $id)
    {
        $ap                       = AppModel::find($id);
        $ap->app_name             = $request->app_name;
        $ap->privacy_policy       = $request->privacy_policy;
        $ap->tearms_and_condition =$request->tearms_and_condition;
        $ap->save();
        return redirect()->route('app.manage');
    }
 

public function deleteAppDetails(Request $request){
  //dd($request->all());
 $data = AppModel::find($request->app_id);
 //dd($data);
 $data->delete();
 return response()->json('success');
 }
}