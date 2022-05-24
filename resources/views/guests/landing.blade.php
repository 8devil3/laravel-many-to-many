@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
   <div class="container">
      <h1 class="text-center mb-3">Welcome</h1>
      <h3>Posts list</h3>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Title</th>
               <th scope="col">Author</th>
               <th scope="col">Category</th>
               <th scope="col">Published on</th>
               <th scope="col">Excerpt</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($posts as $post)
               <tr>
                  <td scope="row">{{ $post->title }}</td>
                  <td scope="row">{{ $post->user->name }}</td>
                  <td scope="row">{{ $post->category->name }}</td>
                  <td><time>{{ date('d/m/Y', strtotime($post->date)) }}</time></td>
                  <td>{{ substr($post->content, 0, 64) }}...</td>
               </tr>
            @endforeach
         </tbody>
      </table>
      {{ $posts->links() }}
   </div>
@endsection








