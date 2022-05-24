<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $categories = Category::orderBy('name')
                              ->paginate(10);
      return view('admin.categories.index', compact('categories'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.categories.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $category = Category::create($request->all());

      return redirect()->route('admin.categories.index', $category->id);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function edit(Category $category)
   {
      return view('admin.categories.edit', compact('category'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Category $category)
   {
      $category->update($request->all());
      return redirect()->route('admin.categories.index', $category->id);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function destroy(Category $category)
   {
      $category->delete();
      return redirect()->route('admin.categories.index');
   }
}
