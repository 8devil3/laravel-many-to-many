@extends('layouts.app')

@section('title', 'Add new category')


@section('content')
<form method="POST" action="{{ route('admin.categories.store') }}" id="input-form">
   @csrf

   <h1 class="mb-4">Add new category</h1>

   <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="input-name" name="name" aria-describedby="name">

      @error('name')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3 d-flex flex-column">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" cols="30" rows="10" class="form-control" aria-describedby="description"></textarea>
   </div>


   <button type="submit" class="btn btn-primary">Add</button>

   <div class="btn btn-secondary" id="btn-reset">Clear fields</div>

   <a href="{{ route('admin.categories.index') }}" class="btn btn-link" id="btn-back">Back to all</a>

</form>
@endsection
