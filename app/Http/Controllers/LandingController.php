<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;

use Illuminate\Http\Request;

class LandingController extends Controller
{
   public function index()
   {
      $posts = Post::orderBy('date', 'desc')->paginate(20);
      return view('guests.landing', compact('posts'));
   }
}
