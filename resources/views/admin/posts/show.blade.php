@extends('layouts.app')

@section('title', $post->title)

@section('content')
   <div class="container">
      <h1>{{ $post->title }}</h1>
      <p>Author: <span style="color: #3962d1">{{ $post->user->name }}</span> | City: <span style="color: #3962d1">{{ $post->user->user_info->city }}</span></p>
      <time>{{ date('d/m/Y', strtotime($post->date)) }}</time>
      <p class="mt-4">{{ $post->content }}</p>
      <hr>

      <!-- Edit btn -->
      <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-warning">Edit</a>

      <!-- Popup Trigger -->
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delPopup">Delete</button>

      <a href="{{ route('admin.posts.index') }}" class="btn btn-link" id="btn-back">Back to all</a>

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
                      <form class="d-inline-block" method="POST" action="{{ route('admin.posts.destroy', $post->slug) }}">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" id="btnDel">Yes, delete</button>
                      </form>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancel</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- / -->
   </div>
@endsection
