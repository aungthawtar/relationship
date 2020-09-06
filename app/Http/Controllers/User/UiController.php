<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\LikesDislike;

class UiController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('user/blog/index',compact('posts'));
    }

    public function detail($id){
        $post = Post::find($id);
        $likes = LikesDislike::where('post_id',$id)->where('type','like')->get();
        $dislikes = LikesDislike::where('post_id',$id)->where('type','dislike')->get();
        return view('user/blog/detail',compact('post','likes','dislikes'));
    }
    
}
