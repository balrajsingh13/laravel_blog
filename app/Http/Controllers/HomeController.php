<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;
use App\Comment;

class HomeController extends Controller
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
    public function index()
    {
        $data = User::get();
        return view('home', compact ('data'));
    }

    public function publishBlog(Request $request){      //use to save blog of paticular user
        $email = \Auth::user()->email;
        $user_id = User::all()->where('email', $email)->first();
    
        Blog::create([
            'user_id' => $user_id["id"],
            'title' => $request->title,
            'content' => trim($request->content)
        ]);

        return redirect()->route('blogs');
    }

    public function viewBlogs(){        //use to view blogs of particular user
        $email = \Auth::user()->email;      //use to get email address
        $user_id = User::all()->where('email', $email)->first();//here we reteriving row of particular user on basis of email
        $user = User::find($user_id["id"]);     //find user on the basis of id.
        $data = $user->blogs()->get();      //finding out the blog related to particular user.
        return view('blog', compact ('data')); 
    }

    public function viewAllBlogs(){         //use to view all users blogs
        $data = Blog::get();
        return view('allblog', compact('data'));
    }

    public function bringDataForEdit($id){      //use to get data to populate the form for editing
        $data = Blog::all()->where('id', $id)->first();
        return view('editBlog', compact('data','id'));
    }

    public function update(Request $request, $id){       //use to update blog.
        Blog::where('id', $id)
          ->update(['title' => $request->title,
          'content' => trim($request->content)
        ]);

        $email = \Auth::user()->email;      //use to get email address
        $user_id = User::all()->where('email', $email)->first();//here we reteriving row of particular user on basis of email
        $user = User::find($user_id["id"]);     //find user on the basis of id.
        $data = $user->blogs()->get();
        return view('blog', compact('data'));
    }

    public function addComment(Request $request, $id){      //use to save blog of paticular user
        $mess = $request->input('comment'); 
        $email = \Auth::user()->email;
        $user_data = User::all()->where('email', $email)->first();
        $blog_data = Blog::all()->where('user_id', $user_data["id"])->first();
    
        Comment::create([
            'user_id' => $user_data["id"],
            'blog_id' => $blog_data["id"],
            'comment_body' => trim($request->comment)
        ]);

         return redirect()->route('allblogs');
    }
}
