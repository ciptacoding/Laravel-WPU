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
    $title = '';

    if(request('category')){
      $category = Category::firstWhere('slug', request('category'));
      $title = ' in ' . $category->name;
    }
    if(request('user')){
      $user = User::firstWhere('username', request('user'));
      $title = ' by ' . $user->name;
    }

    return view('posts', 
    [
      "headTitle" => "All Posts". $title,
      "active" => "posts",
      "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString()
    ]);
  }

  public function show(Post $post)
  {
    return view('post', 
    [
      "headTitle" => $post->title,
      "active" => "posts",
      "post" => $post //route model binding
    ]);
  }

  public function categories()
  {
    return view('categories', 
    [
      "headTitle" => "Posts Categories",
      "active" => "category",
      "categories" => Category::all()
    ]);
  }

  // public function showCategory(Category $category)
  // {
  //   return view('posts', 
  //   [
  //     "headTitle" => "Category : ".$category->name,
  //     "active" => "category",
  //     "posts" => $category->posts,
  //   ]);
  // }

  // public function showAuthors(User $user){
  //   return view('posts',[
  //     "headTitle" => "Posts By Authors : ".$user->name,
  //     "active" => "posts",
  //     "posts" => $user->posts->load('category', 'user')
  //   ]);
  // }
}
