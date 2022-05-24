@extends('layouts.app')

@section('title', 'Categories list')

@section('content')
   <div class="container">
      <div class="d-flex justify-content-between align-items-center">
         <h1>Categories list</h1>
         <a href="{{ route('admin.categories.create') }}" class="btn btn-success">+ Add category</a>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Name</th>
               <th scope="col">Description</th>
               <th scope="col">Actions</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($categories as $category)
               <tr>
                  <td scope="row">{{ $category->name }}</td>
                  <td scope="row">{{ $category->description }}</td>
                  <td>
                     <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning me-2">Edit</a>

                     <!-- Popup Trigger -->
                     <button type="button" data-baseurl="{{ route('admin.categories.index') }}" data-id="{{ $category->id }}" data-type="category" class="btn btn-danger btn-del" data-bs-toggle="modal" data-bs-target="#delPopup">Delete</button>
                     <!-- / -->
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
      {{ $categories->links() }}
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
                  Do you really want to delete this category?
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
