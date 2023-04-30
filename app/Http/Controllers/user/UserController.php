<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Alaouy\Youtube\Facades\Youtube;

class UserController extends Controller
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

    

  public function index()
  {
    
    return view('security.index');
  }

  public function admin(){
     return view('security.login');
  }
   public function services()
   {
    $menus      = DB::table('menu')->select('*')->get();
    $subMenus   = DB::table('submenu')->select('*')->get();
    $servicesBackGrounds    = DB::table('services')->select('*')->first();
    $servicesSectionONeName = DB::table('catagory')->select('*')->where('sectionId',1)->where('menuId',2)->first();
    $servicesSectionTwoName = DB::table('catagory')->select('*')->where('sectionId',2)->where('menuId',2)->first();
    $sectionOneContents  = DB::table('postWithImage')
    ->select('*')
    ->where('sectionId',1)
    ->where('menuId',2)
    ->get();
    $sectionTwoContents  = DB::table('post')
    ->select('*')
    ->where('sectionId',2)
    ->where('menuId',2)
    ->get();

    $servicesArray        = array(
     'menus'                  => $menus,
     'subMenus'               => $subMenus,
     'servicesBackGrounds'    => $servicesBackGrounds,
     'servicesSectionONeName' => $servicesSectionONeName,
     'servicesSectionTwoName' => $servicesSectionTwoName,
     'sectionOneContents'     => $sectionOneContents,
     'sectionTwoContents'     => $sectionTwoContents
   );
    return view('security.service',$servicesArray);

  }

  public function portfolio()
  {
    $menus                   = DB::table('menu')->select('*')->get();
    $subMenus                = DB::table('submenu')->select('*')->get();
    $portfolioBackGrounds    = DB::table('portfolio')->select('*')->first();
    $portfolioSectionOneName = DB::table('catagory')->select('*')->where('sectionId',1)->where('menuId',4)->first();
    $portfolioSectionTwoName = DB::table('catagory')->select('*')->where('sectionId',2)->where('menuId',2)->first();

    $sectionOneContents  = DB::table('postWithImage')
    ->select('*')
    ->where('sectionId',1)
    ->where('menuId',4)
    ->get();
    $sectionTwoContents  = DB::table('post')
    ->select('*')
    ->where('sectionId',2)
    ->where('menuId',2)
    ->get();
    $galleryName           = DB::table('catagory')->select('*')->where('menuId',1)->where('sectionId',10)->first();
    $galleries             = DB::table('gallery')->select('*')->get();
    $portfolioArray        = array(
     'menus'                   => $menus,
     'subMenus'                => $subMenus,
     'portfolioBackGrounds'    => $portfolioBackGrounds,
     'portfolioSectionOneName' => $portfolioSectionOneName,
     'portfolioSectionTwoName' => $portfolioSectionTwoName,
     'sectionOneContents'      => $sectionOneContents,
     'galleries'               => $galleries,
     'galleryName'             => $galleryName,
     'sectionTwoContents'      => $sectionTwoContents
   );
    return view('security.portfolio',$portfolioArray);

  }

  public function about()
  {
    $menus                  = DB::table('menu')->select('*')->get();
    $subMenus               = DB::table('submenu')->select('*')->get();
    $aboutBackGrounds       = DB::table('backgroundImage')
    ->where('menuId', 8)
    ->select('*')->first();
    $sectionOneContents     = DB::table('postWithImage')
    ->select('*')
    ->where('sectionId',1)
    ->where('menuId',8)
    ->get();
    $servicesSectionTwoName = DB::table('catagory')->select('*')->where('sectionId',1)->where('menuId',2)->first();

    $sectionTwoContents     = DB::table('postWithImage')
    ->select('*')
    ->where('sectionId',1)
    ->where('menuId',2)
    ->get();
    $galleryName         = DB::table('catagory')->select('*')->where('menuId',1)->where('sectionId',10)->first();
    $galleries           = DB::table('gallery')->select('*')->get();
    $aboutViewArray      = array(
      'menus'                  => $menus,
      'subMenus'               => $subMenus,
      'aboutBackGrounds'       => $aboutBackGrounds,
      'sectionOneContents'     => $sectionOneContents,
      'servicesSectionTwoName' => $servicesSectionTwoName,
      'galleries'              => $galleries,
      'galleryName'            => $galleryName,
      'sectionTwoContents'     => $sectionTwoContents
    );
    return view('security.about',$aboutViewArray);

  }

  public function media()
  {
    $menus                  = DB::table('menu')->select('*')->get();
    $subMenus               = DB::table('submenu')->select('*')->get();
    $aboutBackGrounds       = DB::table('backgroundImage')->select('*')
    ->where('menuId', 5)
    ->first();
    $sectionOneContents     = DB::table('postWithImage')
    ->select('*')
    ->where('sectionId',1)
    ->where('menuId',3)
    ->get();
    $servicesSectionTwoName = DB::table('catagory')->select('*')->where('sectionId',1)->where('menuId',2)->first();

    $sectionTwoContents     = DB::table('postWithImage')
    ->select('*')
    ->where('sectionId',1)
    ->where('menuId',2)
    ->get();
    $galleryName         = DB::table('postWithImage')->where('menuId',5)->select('*')->get();
    $galleries           = DB::table('gallery')->select('*')->get();

    // dd($galleries, $galleryName);

    $aboutViewArray      = array(
      'menus'                  => $menus,
      'subMenus'               => $subMenus,
      'aboutBackGrounds'       => $aboutBackGrounds,
      'sectionOneContents'     => $sectionOneContents,
      'servicesSectionTwoName' => $servicesSectionTwoName,
      'galleries'              => $galleries,
      'galleryName'            => $galleryName,
      'sectionTwoContents'     => $sectionTwoContents
    );
    return view('security.media',$aboutViewArray);

  }

  public function contact()
  {
    $menus              = DB::table('menu')->select('*')->get();
    $subMenus           = DB::table('submenu')->select('*')->get();
    $contactInfos       = DB::table('contactInfos')->select('*')->first();
    $contactBackGrounds = DB::table('contact')->select('*')->first();
    $contactArr         = array(
      'menus'              => $menus,
      'subMenus'           => $subMenus,
      'contactInfos'       => $contactInfos,
      'contactBackGrounds' => $contactBackGrounds
    );
    return view('security.contact',$contactArr);
  }

  public function getPhotoInfo(Request $request){
    $data = DB::table('postWithImage')->where('id', $request->id)->first();
    return response()->json($data);
  }

  public function getNewsDetails(Request $request){
    $data = DB::table('postWithImage')->where('id', $request->id)->first();
    return response()->json($data);
  }

  // RJ 
  public function createRJ(){
    $team = DB::table('team')->where('softDel', 0)->orderBy('name')->get();
    $data   = array(
      'team' => $team
    );
    return view('security.admin.createTeamMember', $data);
  }

  public function editRJDetails(Request $request){
    $data = DB::table('team')->where('id', $request->id)->first();
    return response()->json($data);
  }
  
  public function deleteRJ(Request $request){
    DB::table('team')->where('id', $request->id)->update(['softDel' => 1]); 
    return redirect('admin/createRJ')->with('success');
  }

  public function saveRJ(Request $data){
    $imageFileName="";
    if($data->hasFile('firstSectionImage')):
      $image    = $data->file('firstSectionImage');
      $filename = $image->getClientOriginalName();
      $EXT      = $image->getClientOriginalExtension();
      $imageFileName = base64_encode($filename);
      $imageFileName = $imageFileName;
      $data->file('firstSectionImage')->move('public/uploads/images/team/', $imageFileName);
    endif;

    DB::beginTransaction();
    try{

        if($data->id){
          DB::table('team')->where('id', $data->id)->update([
            'name' => $data['Name'],
            'designation' => $data['designation'],
            'facebook' => $data['Facebook'],
            'instagram' => $data['Instagram'],
            'twitter' => $data['Twitter'],
            'others' => $data['Others']
          ]);
          if($imageFileName)
            DB::table('team')->where('id', $data->id)->update([
              'imgPath' => $imageFileName
            ]);
        }
        else{
          DB::table('team')->insert( array (
            'name' => $data['Name'],
            'designation' => $data['designation'],
            'imgPath' => $imageFileName,
            'facebook' => $data['Facebook'],
            'instagram' => $data['Instagram'],
            'twitter' => $data['Twitter'],
            'others' => $data['Others']
          ));
        }

        DB::commit();
        return redirect('admin/createRJ')->with('success');
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


  // WHO WE ARE
  public function createWhoWeAre(){
    $whoweare = DB::table('who_we_are')->where('softDel', 0)->latest('updatedOn')->first();    
    return view('security.admin.createWhoWeAre', compact('whoweare'));
  }

  public function deleteWhoWeAre(Request $request){
    DB::table('who_we_are')->where('id', $request->id)->update(['softDel' => 1]); 
    return redirect('admin/createWhoWeAre')->with('success');
  }

  public function saveWhoWeAre(Request $data){
    DB::beginTransaction();
    try{

        if($data->id){
          DB::table('who_we_are')->where('id', $data->id)->update([
            'aboutus' => $data['aboutus'],
            'history' => $data['history'],
            'coverage' => $data['coverage']           
          ]);          
        }
        else{
          DB::table('who_we_are')->insert( array (
            'aboutus' => $data['aboutus'],
            'history' => $data['history'],
            'coverage' => $data['coverage']  
          ));
        }

        DB::commit();
        return redirect('admin/createWhoWeAre')->with('success');
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

  // PROGTRAMS 
  public function createProgram(){
    $programs = DB::table('programs')->where('softDel', 0)->orderBy('program_name')->get();
    $team = DB::table('team')->where('softDel', 0)->orderBy('name')->get();
    $data   = array(
      'programs' => $programs,
      'team' => $team
    );
    return view('security.admin.createProgram',$data);
  }

  public function deleteProgram(Request $request){
    DB::table('programs')->where('id', $request->id)->update(['softDel' => 1]); 
    return redirect('admin/createProgram')->with('success');
  }

  public function saveProgram(Request $data){
    DB::beginTransaction();
    try{
        DB::table('programs')->insert( array (
          'program_name' => $data['program_name'],
          'program_type' => $data['program_type'],
          'program_host' => $data['program_host'],
        ));

        DB::commit();
        return redirect('admin/createProgram')->with('success');
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


  // SCHEDULE 
  public function createSchedule(){
    $programSchedules = DB::table('program_schedule')->where('softDel', 0)->orderBy('programTime')->get();
    $programs = DB::table('programs')->where('softDel', 0)->orderBy('program_name')->get();
      foreach($programSchedules as $schedule){
        $schedule->programWeekday = explode(',',$schedule->programWeekday);
    }
    $data   = array(
      'programs' => $programs,
      'programSchedules' => $programSchedules
    );
    return view('security.admin.createSchedule',$data);
  }
  
  public function deleteSchedule(Request $request){
    DB::table('program_schedule')->where('id', $request->id)->update(['softDel' => 1]); 
    return redirect('admin/createSchedule')->with('success');
  }

  public function saveProgramSchedule(Request $data){
    DB::beginTransaction();
    try{
        DB::table('program_schedule')->insert( array (
          'programName' => $data['programname'],
          'programTime' => $data['time'],
          'programWeekday' => $data['programDays'],
        ));

        DB::commit();
        return redirect('admin/createSchedule')->with('success');
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

  // YOUTUBE VIDEOS
  public function createVideo(){
    $videos = DB::table('youtube_url')->where('softDel', 0)->get();      
    $indexArr   = array(
      'videos' => $videos
    );
    return view('security.admin.videoPlaylist',$indexArr);
  }

  public function deleteVideo(Request $request){
    DB::table('youtube_url')->where('id', $request->id)->update(['softDel' => 1]); 
    return redirect('admin/createSchedule')->with('success');
  }

  public function saveVideo(Request $data){
    DB::beginTransaction();
    try{
        DB::table('youtube_url')->insert( array (
          'title' => $data['title'],
          'url' => $data['url']
        ));

        DB::commit();
        return redirect('admin/createVideo')->with('success');
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



  public function registerUser(Request $data)
  { 
    if(DB::table('users')->where('email', $data['email'])->exists()){     
      return response()->json('user exists already');             
    }

    DB::beginTransaction();
    try{
        DB::table('users')->insert( array (
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
        ));

        DB::commit();
        return response()->json('success');
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
