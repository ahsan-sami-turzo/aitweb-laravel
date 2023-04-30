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
class AboutController extends Controller
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

    public function adminAboutPageEditor()
    {
        $aboutBackGrounds       = DB::table('about')->select('*')->get();
        // dd( $aboutBackGrounds);
        // $sections               = DB::table('catagory')->select('*')->where('menuId',2)->first();
        // $firstSectionContents   = DB::table('postWithImage')->select('*')->where('menuId',3)->where('sectionId',1)->get();
        // $subMenus               = DB::table('submenu')->select('*')->get();
        // $servicePageEditorArr   = array(
        //                           'aboutBackGrounds'      => $aboutBackGrounds,
        //                           'firstSectionContents'  => $firstSectionContents,
        //                           'subMenus'              => $subMenus

        //                                );
        return view('security.admin.aboutPageEditor.adminAboutPageEditor',compact('aboutBackGrounds'));
    }



    public function deleteBackgroundImageAbout(Request $request){

        $delete = DB::table('about')->where('id',$request->deleteBackGround)->delete();
        return response::json('success');
    }

    public function firstSectionContentsOfAbout(Request $request)
    {
      
        $imageFileName="";

        if($request->hasFile('firstSectionImage')):
            $image    = $request->file('firstSectionImage');
            $filename = $image->getClientOriginalName();
            $EXT      = $image->getClientOriginalExtension();
            $imageFileName = base64_encode($filename);
            $imageFileName = $imageFileName;
            $request->file('firstSectionImage')->move('uploads/images/about/', $imageFileName);
        endif;


        $addContent          = new AboutModel;
        $time= Carbon::now();
        $addContent->small_title     = $request->small_title;
        $addContent->big_title       = $request->big_title;
        $addContent->short_content   = $request->short_content;
        $addContent->long_content    = $request->long_content;
        $addContent->image           = $imageFileName;
       // dd($addContent);
        $addContent->save();

        return response::json('success');
    }

    public function aboutSectionOneContentsEditView(Request $request)
    {
         $viewData = DB::table('about')->where('id',$request->attri)->select('*')->get();
        //  dd($viewData);
         return response()->json($viewData);
    }

    public function editFirstSectionContentsOfAbout(Request $request)
    {
        $imageFileName="";
        if($request->hasFile('editSectionOneContentImage')):
            $image    = $request->file('editSectionOneContentImage');
            $filename = $image->getClientOriginalName();
            $EXT      = $image->getClientOriginalExtension();
            $imageFileName = base64_encode($filename);
            $imageFileName = $imageFileName;
           
            $request->file('editSectionOneContentImage')->move('uploads/images/about/', $imageFileName);

             $addContent                =  AboutModel::where('id',$request->hiddenSectionOneContentEdit)->first();
             $addContent->imgPath       = $imageFileName;
            // $addContent->save();
        endif;


        $addContent   = AboutModel::find($request->hiddenSectionOneContentEdit);
        $time= Carbon::now();
        $addContent->small_title     = $request->small_title;
        $addContent->big_title       = $request->big_title;
        $addContent->short_content   = $request->short_content;
        $addContent->long_content    = $request->long_content;
        $addContent->image           = $imageFileName;
       // dd($addContent);
        $addContent->save();

        return response::json('success');
    }

    public function aboutDeletePostSectionOne(Request $request){

        $delete = DB::table('postWithImage')->where('id',$request->deleteContentSectionOne)->delete();
        return response::json('success');
    }



}
