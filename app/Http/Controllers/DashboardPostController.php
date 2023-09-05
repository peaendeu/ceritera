<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('dashboard.posts.index', [
      'posts' => Post::where('user_id', auth()->user()->id)->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();
    return view('dashboard.posts.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'title' => 'required|min:10|max:100',
      'slug' => 'required|min:10|max:100|unique:posts',
      'category_id' => 'required',
      'image' => 'image|file|max:1500',
      'body' => 'required|min:10'
    ]);

    if ($request->file('image')) {
      $validatedData['image'] = $request->file('image')->store('post-images');
    }

    $validatedData['user_id'] = auth()->user()->id;
    $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

    Post::create($validatedData);
    return redirect('/dasbor/postingan')->with('success', 'Anda berhasil menambah sebuah postingan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function show(Post $postingan)
  {
    return view('dashboard.posts.show', [
      'post' => $postingan
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $postingan)
  {
    return view('dashboard.posts.edit', [
      'post' => $postingan,
      'categories' => Category::all()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Post $postingan)
  {
    $rules = [
      'title' => 'required|min:10|max:100',
      'category_id' => 'required',
      'image' => 'image|file|max:1500',
      'body' => 'required|min:10'
    ];

    if ($request->slug != $postingan->slug) {
      $rules['slug'] = 'required|min:10|max:100|unique:posts';
    }

    $validatedData = $request->validate($rules);

    if ($request->file('image')) {
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }

      $validatedData['image'] = $request->file('image')->store('post-images');
    }

    $validatedData['user_id'] = auth()->user()->id;
    $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

    Post::where('id', $postingan->id)->update($validatedData);
    return redirect('/dasbor/postingan')->with('success', 'Anda berhasil mengubah sebuah postingan.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function destroy(Post $postingan)
  {
    if ($postingan->image) {
      Storage::delete($postingan->image);
    }

    Post::destroy($postingan->id);
    return redirect('/dasbor/postingan')->with('success', 'Anda berhasil menghapus sebuah postingan.');
  }
}
