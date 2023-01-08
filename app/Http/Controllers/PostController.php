<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    return view('posts', 
    [
      "headTitle" => "Posts",
      "posts" => Post::all()
    ]);
  }

  public function show(Post $post)
  {
    return view('post', 
    [
      "headTitle" => "Posts",
      "post" => $post //route model binding
    ]);
  }

  public function categories()
  {
    return view('categories', 
    [
      "headTitle" => "Categories",
      "categories" => Category::all()
    ]);
  }

  public function showCategory(Category $category)
  {
    return view('category', 
    [
      "headTitle" => "Category", 
      "posts" => $category->posts,
      "category" => $category->name,
    ]);
  }
}
