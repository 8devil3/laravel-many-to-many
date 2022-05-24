<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tag;

class PostController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $posts = Post::where('user_id', Auth::user()->id)
                     ->orderBy('date', 'desc')
                     ->paginate(20);
      return view('admin.posts.index', compact('posts'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $categories = Category::all();
      $tags = Tag::all();
      return view('admin.posts.create', [
         'catgories' => $categories,
         'tags' => $tags
      ]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $formData = $request->all() + [
         'user_id' => Auth::user()->id
      ];

      $post = Post::create($formData);

      return redirect()->route('admin.posts.show', $post->slug);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function show(Post $post)
   {
      return view('admin.posts.show', compact('post'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function edit(Post $post)
   {
      //per evitare modifiche non autorizzate di utenti esterni
      if (Auth::user()->id !== $post->user_id) abort(403);
      return view('admin.posts.edit', compact('post'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Post $post)
   {
      $post->update($request->all());
      return redirect()->route('admin.posts.show', $post->slug);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function destroy(Post $post)
   {
      //per evitare modifiche non autorizzate di utenti esterni
      if (Auth::user()->id !== $post->user_id) abort(403);

      $post->delete();

      return redirect()->route('admin.posts.index');
   }
}
