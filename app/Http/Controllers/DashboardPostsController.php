<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardPostsController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index',[
          "headTitle" => "My Posts",
          "posts" => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }


    public function create()
    {
        return view('dashboard.posts.create',[
          "headTitle" => "Create New Post",
          "categories" => Category::all()
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'title' => 'required|max:255',
          'slug' => 'required|unique:posts',
          'image' => 'image|file|max:2048',
          'category_id' => 'required',
          'body' => 'required'
        ]);

        if($request->file('image')){
          $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id; 
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 80);

        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }


    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
          "headTitle" => "Dashboard Post",
          "post" => $post
        ]);
    }


    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
          "headTitle" => "Update Post",
          "post" => $post,
          "categories" => Category::all()
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $rules = [
          'title' => 'required|max:255',
          'category_id' => 'required',
          'body' => 'required'
        ];

        if($request->slug != $post->slug){
          $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id; 
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 80);

        Post::where('id', $post->id)
            ->update($validatedData);
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }


    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }


    public function checkSlug(Request $request)
    {
      $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
      return response()->json(['slug' => $slug]);
    }
}
