<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AboutModel;
use App\models\Gallery;
use Illuminate\Support\Facades\DB;
use App\models\News;
class NewsController extends Controller
{
   public function index(){
      $news = News::where('status',1)->orderBy('id', 'DESC')->get();
      return view('frontEnd.news.newsLists',[
         'news' =>  $news
      ]);
   }

   public function newsDetails($id){
      $news = News::find($id);
      return view('frontEnd.news.newsDetail',[
          'news' => $news
      ]);
  }
}
