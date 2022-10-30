<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs=Blog::all();
        $users=User::all();
        $comments=Comment::all();
        return view('home')->with(['blogs' => $blogs,'users'=>$users,'comments'=>$comments]);;
    }
}
