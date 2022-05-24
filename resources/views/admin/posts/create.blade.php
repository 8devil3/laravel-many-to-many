@extends('layouts.app')

@section('title', 'Add new post')


@section('content')
<form method="POST" action="{{ route('admin.posts.store') }}" id="input-form">
   @csrf

   <h1 class="mb-4">Add new post</h1>

   <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="input-title" name="title" aria-describedby="title">

      @error('title')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3">
      <label for="category" class="form-label">Category</label>

      <select name="category_id" id="select-category" class="form-control @error('category') is-invalid @enderror">
         <option value="" default>Select a category</option>
         @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
         @endforeach
      </select>

      @error('category')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="input-slug" name="slug" aria-describedby="slug">

      @error('slug')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3 d-flex flex-column">
      <label for="content" class="form-label">Content</label>
      <textarea name="content" cols="30" rows="10" class="form-control" aria-describedby="content"></textarea>
   </div>

   <div class="mb-3">
      <label for="date" class="form-label">Post date</label>
      <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" aria-describedby="post date" value="{{ date('Y-m-d') }}">

      @error('date')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>


   <button type="submit" class="btn btn-primary">Add</button>

   <div class="btn btn-secondary" id="btn-reset">Clear fields</div>

   <a href="{{ route('admin.posts.index') }}" class="btn btn-link" id="btn-back">Back to all</a>

</form>
@endsection
