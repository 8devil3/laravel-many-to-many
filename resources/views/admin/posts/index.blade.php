@extends('layouts.app')

@section('title', 'Posts list')

@section('content')
   <div class="container">
      <div class="d-flex justify-content-between align-items-center">
         <h1>Your posts list</h1>
         <a href="{{ route('admin.posts.create') }}" class="btn btn-success">+ Add post</a>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Title</th>
               <th scope="col">Date</th>
               <th scope="col">Category</th>
               <th scope="col">Excerpt</th>
               <th scope="col">Actions</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($posts as $post)
               <tr>
                  <td scope="row">{{ $post->title }}</td>
                  <td scope="row"><time>{{ date('d/m/Y', strtotime($post->date)) }}</time></td>
                  {{-- @dd($post->category['name']) --}}
                  <td scope="row">{{ $post->category->name }}</td>
                  <td>{{ substr($post->content, 0, 64) }}...</td>
                  <td>
                     <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-primary">View</a>
                     <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-warning mx-2">Edit</a>

                     <!-- Popup Trigger -->
                     <button type="button" data-baseurl="{{ route('admin.posts.index') }}" data-slug="{{ $post->slug }}" data-type="post" class="btn btn-danger btn-del" data-bs-toggle="modal" data-bs-target="#delPopup">Delete</button>
                     <!-- / -->
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
      {{ $posts->links() }}
   </div>

   <!-- Deletion popup -->
   <div class="modal fade" id="delPopup" tabindex="-1" aria-labelledby="delPopup" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="delPopuplLabel">Confirm deletion</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  Do you really want to delete this post?
            </div>
            <div class="modal-footer">
               <form class="d-inline-block" method="POST" id="indexForm">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" id="btnDel">Yes, delete</button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancel</button>
            </div>
         </div>
      </div>
   </div>
@endsection
