<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class Blog extends Controller
{
    //

    function index($page = 1)
    {
      $blogs = \App\BlogModel::where('blogs.is_deleted', 0)
               ->join('bloggers', 'bloggers.id', '=', 'blogs.blogger_id')
               ->orderBy('created_at','desc')
               ->paginate(3,['blogs.id as id','title','description', 'blogs.created_at', 'bloggers.name as name']);

      return view('main', ['blogs' => $blogs, 'page' => $page]);


    }

    function getBlogById($id)
    {
      $blogs = \App\BlogModel::where('blogs.is_deleted', 0)->where('blogs.id', $id)
               ->join('bloggers', 'bloggers.id', '=', 'blogs.blogger_id')
               ->orderBy('blogs.created_at','desc')
               ->first();

      return view('blog', ['blog' => $blogs]);


    }

}
