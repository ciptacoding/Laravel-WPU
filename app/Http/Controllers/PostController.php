<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    return view('posts', 
    [
      "headTitle" => "All Posts",
      "active" => "posts",
      "posts" => Post::latest()->get()
    ]);
  }

  public function show(Post $post)
  {
    return view('post', 
    [
      "headTitle" => "Posts",
      "active" => "posts",
      "post" => $post //route model binding
    ]);
  }

  public function categories()
  {
    return view('categories', 
    [
      "headTitle" => "Categories",
      "active" => "category",
      "categories" => Category::all()
    ]);
  }

  public function showCategory(Category $category)
  {
    return view('posts', 
    [
      "headTitle" => "Category",
      "active" => "category",
      "posts" => $category->posts,
    ]);
  }

  public function showAuthors(User $user){
    return view('posts',[
      "headTitle" => "Posts By Authors",
      "active" => "posts",
      "posts" => $user->posts->load('category', 'user')
    ]);
  }
}
