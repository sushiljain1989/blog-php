<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class Blogger extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }

    function index(Request $request)
    {

      if($this->isAdmin($request) == 1)
      {
        $blogs = \App\BlogModel::where('blogs.is_deleted', 0)
                 ->join('users', 'users.id', '=', 'blogs.blogger_id')
                 ->orderBy('created_at','desc')
                 ->paginate(3,['blogs.id as id','title','description', 'blogs.created_at', 'users.name as name']);
      }
      else {

        $blogs = \App\BlogModel::where('blogs.is_deleted', 0)
                 ->where('users.id', '=', Auth::id())
                 ->join('users', 'users.id', '=', 'blogs.blogger_id')
                 ->orderBy('created_at','desc')
                 ->paginate(3,['blogs.id as id','title','description', 'blogs.created_at', 'users.name as name']);
      }



      return view('bloggers.all', ['blogs' => $blogs]);
    }

    function updateBlog(Request $request)
    {

        \App\BlogModel::where('id', $request->input('id'))
          ->update(['title' => $request->input('title'), 'description' => $request->input('description')]);
          return 1;
    }

    function deleteBlog(Request $request)
    {

        \App\BlogModel::where('id', $request->input('id'))
          ->update(['is_deleted' => 1]);
          return 1;
    }

    function createBlog(Request $request)
    {
      #echo "<pre>";print_r($request->session()->all());die;

      $title = $request->input('title');
      $description = $request->input('description');
      $blogger_id = Auth::id();
      $blog = new \App\BlogModel;

      $blog->title = $title;
      $blog->description = $description;
      $blog->blogger_id = $blogger_id;

      $blog->save();
      return view('bloggers.create', ['msg' => 1]);
    }

    function updatePassword(Request $request)
    {
      //die("negative");
      $msg = "";
      $this->validate($request, [
        'old_password' => 'required|string',
        'password' => 'required|string|min:6|confirmed',
    ]);

      if(Auth::attempt(['id'=>Auth::id(),'password'=>$request->input('old_password')]))
      {

        $request->user()->fill([
             'password' => Hash::make($request->input('password'))
         ])->save();

        $msg = "Password changed successfully";
      }
      else {
        $msg = "Old password is wrong";
      }


      return view('bloggers.changepassword', ['msg' => $msg]);
    }

    function bloggersList()
    {
      $bloggers = \App\User::where('id', '<>', Auth::id() )->paginate(10, ['id','name', 'email', 'is_activated']);
      return view('bloggerslist', ['bloggers'=>$bloggers]);
    }

    function isAdmin(Request $request)
    {
      if (!$request->session()->has('isAdmin'))
      {
    //
          $id = Auth::id();
          $data = \App\User::where('id', $id)->first(['is_admin']);
          if($data['is_admin'] == 1)
          {
            $request->session()->put('is_admin', '1');
          }
          else {
            $request->session()->put('is_admin', '0');
          }
      }

      return $request->session()->get('is_admin');

    }

    function changeStatus(Request $request)
    {
      $status = $request->input('status');
      \App\User::where('id', $request->input('id'))
          ->update(['is_activated' => $status]);
          return 1;
    }

    function deleteBlogger(Request $request)
    {
      \App\User::destroy($request->input('id'));
      return 1;

    }


}
