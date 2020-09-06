<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Category;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin/post/index',compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin/post/create',compact('categories'));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $imageName = time().'_'.$image->getClientOriginalName();
        $image->storeAs('uploads',$imageName);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);
        return redirect('admin/post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin/post/edit',compact('post','categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($request->hasFile('image')){
            $imageName = $post->image;
            File::delete('uploads/'.$imageName);
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->storeAs('uploads',$imageName);
            $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imageName,
            ]);         
        }else{
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
            ]);
        }

        return redirect('admin/post');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        Storage::delete('uploads/'.$post->image);
        $post->delete();
        return redirect('admin/post');
    }

    public function drift(){
        $posts = Post::onlyTrashed()->get();
        return view ('admin/post/drift',compact('posts'));
    }

    public function restore($id){
        $post = Post::withTrashed()->find($id)->where('id',$id)->restore();
        return redirect('admin/post');
    }

    public function fdelete($id){
        Post::find($id)->forceDelete();
        return redirect('admin/post');
    }
}
