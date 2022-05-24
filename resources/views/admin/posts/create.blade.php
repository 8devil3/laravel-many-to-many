@extends('layouts.app')

@section('title', 'Add new post')


@section('content')
<form method="POST" action="{{ route('admin.posts.store') }}" id="input-form">
   @csrf

   <h1 class="mb-4">Add new post</h1>

   <div class="form-floating mb-3">
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="input-title" name="title" aria-describedby="title" placeholder="Title">
      <label for="title">Title</label>

      @error('title')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3">
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

   <div class="form-floating mb-3">
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="input-slug" name="slug" aria-describedby="slug" placeholder="Slug">
      <label for="slug">Slug</label>

      @error('slug')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="form-floating mb-3 d-flex flex-column">
      <textarea name="content" cols="30" rows="10" class="form-control" aria-describedby="content" placeholder="Content" style="min-height: 200px"></textarea>
      <label for="content">Content</label>
   </div>

   <div class="mb-3">
      <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" aria-describedby="post date" value="{{ date('Y-m-d') }}">

      @error('date')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3">
      {{-- source: https://www.cssscript.com/tags-input-bootstrap-5/ --}}
      <select class="form-select" id="input-tags" name="tags" aria-describedby="tags" multiple>
         <option selected disabled hidden value="">Tags</option>
         @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" data-badge-style="success">{{ $tag->name }}</option>
         @endforeach
      </select>

      <div class="alert alert-danger invalid-feedback">Select valid tags</div>
   </div>




   <button type="submit" class="btn btn-primary">Add</button>

   <div class="btn btn-secondary" id="btn-reset">Clear fields</div>

   <a href="{{ route('admin.posts.index') }}" class="btn btn-link" id="btn-back">Back to all</a>

</form>
@endsection
