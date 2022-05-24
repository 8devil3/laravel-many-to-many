@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
            <div class="card">
               <div class="card-header">{{ __('Dashboard') }}</div>

               <div class="card-body">
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                           {{ session('status') }}
                        </div>
                  @endif

                  {{ __('You are logged in!') }}
               </div>

               <div class="card-footer">
                  <a href="{{ route('guestsHome') }}" class="btn btn-primary">List all posts</a>
                  <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">List my posts</a>
                  <a href="{{ route('admin.posts.create') }}" class="btn btn-success">+ Add post</a>
               </div>
            </div>
      </div>
   </div>
</div>
@endsection
