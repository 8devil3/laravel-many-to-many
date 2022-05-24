@extends('layouts.app')

@section('title', $post->slug)


@section('content')
<form method="POST" action="{{ route('admin.posts.update', $post->slug) }}" id="input-form">
   @csrf
   @method('PUT')

   <h1 class="mb-4">Edit post</h1>

   <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="input-title" name="title" aria-describedby="title" value="{{ old('title', $post->title) }}">

      @error('title')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="input-slug" name="slug" aria-describedby="slug" value="{{ old('slug', $post->slug) }}">

      @error('slug')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3 d-flex flex-column">
      <label for="content" class="form-label">Content</label>
      <textarea name="content" cols="30" rows="10" class="form-control" aria-describedby="content">{{ old('content', $post->content) }}</textarea>
   </div>

   <div class="mb-3">
      <label for="date" class="form-label">Post date</label>
      <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" aria-describedby="post date" value="{{ old('date', date('Y-m-d', strtotime($post->date))) }}">

      @error('date')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>


   <button type="submit" class="btn btn-success">Save</button>

   <div class="btn btn-secondary" id="btn-reset">Clear fields</div>

   <a href="{{ route('admin.posts.index') }}" class="btn btn-link" id="btn-back">Back to all</a>

</form>
@endsection
