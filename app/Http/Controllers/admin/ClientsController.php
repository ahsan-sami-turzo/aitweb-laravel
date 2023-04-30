<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AboutModel;
use App\models\PostWithImageModel;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\models\Clients;
class ClientsController extends Controller
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

    public function createClient(){
        //dd('ok');
          $allData = DB::table('our_clients')->get();
          $allDat = Clients::all();
         // dd($allData);
          return view('security.admin.client.adminClient', compact('allData'));
      }
      
      public function editClientDetails(Request $request){
          $client = DB::table('our_clients')->where('id', $request->id)->first(); 
          return response()->json($client);
      }
      
      
      public function saveClient(Request $request){
        
          if($request->client_id != null){
            $client = Clients::find($request->client_id);
            
            $imageFileName= $client->image;
            //dd($request->hasFile('image'));
            if($request->hasFile('image')):
                $image    = $request->file('image');
                $filename = $image->getClientOriginalName();
                $EXT      = $image->getClientOriginalExtension();
                $imageFileName = base64_encode($filename);
                $imageFileName = $imageFileName;
              
                $request->file('image')->move('uploads/images/clients/', $imageFileName);
            endif;
              
              $time= Carbon::now();
              $client->title  = $request->title;
              $client->name  = $request->name;
              $client->designation  = $request->designation;
              $client->short_desc  = $request->short_desc;
              $client->image       = $imageFileName;
          }else{
            $imageFileName="";
            
            if($request->hasFile('image')):
                $image    = $request->file('image');
                $filename = $image->getClientOriginalName();
                $EXT      = $image->getClientOriginalExtension();
                $imageFileName = base64_encode($filename);
                $imageFileName = $imageFileName;
                $request->file('image')->move('uploads/images/clients/', $imageFileName);
            endif;
            $client         = new Clients;
            $time= Carbon::now();
            $client->title  = $request->title;
            $client->name  = $request->name;
            $client->designation  = $request->designation;
            $client->short_desc  = $request->short_desc;
            $client->image         = $imageFileName;
          }
       // dd($client);
        $client->save();
        return redirect('admin/createClient')->with('success');
      }
      
      public function deleteClientDetails(Request $request){
        $data = Clients::find($request->client_id); 
       
        
        $data->delete();
        return response::json('Client deleted successfully!');
      }
      public function activeClient($id){
        DB::table('our_clients')->where('id', $id)->update(['status' => 1]); 
        return redirect('admin/createClient')->with('success');
      }
      
      public function InactiveClient($id){
        DB::table('our_clients')->where('id', $id)->update(['status' => 0]); 
        return redirect('admin/createClient')->with('success');
      }

}
