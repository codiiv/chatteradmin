<?php

namespace Codiiv\Chatter\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Codiiv\Chatter\Models\ForumCategory;

class ChatterController extends Controller
{
  public function __construct()
  {
      // $this->middleware('auth');
  }
  public function loadAdmin(){
    return view('chatter::admin');
  }
  public function loadInstall(){
    return view('chatter::install');
  }
  public function loadPage($page){
    if (view()->exists('chatter::pages.'.$page))
      {
        return view('chatter::pages.'.$page, ["page"=>$page]);
      }
    else
      {
        return 'Are you sure about that? ';
      }
  }

  public static function insertCategory(Request $request){
    $x      = $request->payload_source;
    $sender = base64_decode(base64_decode($x));
    $category = new ForumCategory;

    if(\Auth::check()):
      $category->name = $request->name;
      $category->parent_id = $request->parent;
      $category->color = '#'.$request->color;
      $slugged = str_slug($request->name, '-');

      $exists = ForumCategory::where('slug', $slugged)->first();
      if($exists){
        $category->slug = $slugged.'-1';
      }else{
        $category->slug = $slugged;
      }
      $saved  = $category->save();
      $lastInsertedId = $category->term_id;

      if($saved){
        $message = __("Created Successfully");
        $msgtype = 1;
      }else{
        $message = __("There were errors creating the post");
        $msgtype = 0;
      }

    else:
      $message = __("You absolutely are NOT authorized to do that");
      $msgtype = 0;
    endif;

    return redirect('/chatteradmin/categories')->with('status', ["message"=>$message, "msgtype"=>$msgtype]);
  }
  static public function deleteCategory(){
    $cat  = $_POST['cat'];
    $page = $_POST['page'];

    $deleted = ForumCategory::destroy($cat);
    if($deleted){
      $message = __("Deleted Successfully");
      $msgtype = "success";
    }else{
      $message = __("There were errors deleting category");
      $msgtype = 0;
    }
    return response()->json(["message"=>$message, "msgtype"=>$msgtype, 'page'=>$page]);
  }
}
