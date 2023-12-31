<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    // $posts = Post::all();

    return view('posts', [
      'posts' => Post::latest()->filter(request(['cari', 'kategori', 'penulis']))->paginate(7)->withQueryString(),
    ]);
  }

  public function show(Post $post)
  {
    return view('post', [
      'post' => $post,
    ]);
  }
}
