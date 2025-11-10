@php
   use App\Models\Category; 
    use App\Models\Post;
    
   $categories =new Category();
   $categories = $categories->get();
   $posts = new Post();
   $posts = $posts->get();

@endphp
@extends('admin.layout')
@section('content')
<div class="container mt-4">
    <h3>Postes </h3>

    <form action="{{url('/create_posts')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="postName" class="form-label">Image</label>
            <input type="file" class="form-control" id="categoryImage" name="image" required>
        
        </div>
        <div class="mb-3">
            <label for="postName" class="form-label">Poste Name</label>
            <input type="text" class="form-control" id="categoryName" name="name" required>
        
        </div>
        <div class="mb-3">
            <label for="postName" class="form-label">Category</label>
            <select name="category" id="" class="form-select">
                <option value="">Select</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                
            </select>        
        </div>
            <div class="mb-3">
            <label for="postName" class="form-label">Content</label>
            <textarea class="form-control" id="categoryContent" name="content" required></textarea> 
        
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
        
    </form>



 
     <table class="table mt-4">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Created by</th>
                <th>Created at</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example category row -->
            @foreach($posts as $post)
            <tr>
                <td><img src="{{asset('images')}}/{{$post->image}}"></td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->categoryData->name }}</td>
                <td>{{ $post->created_by }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <form action="{{url('/del_posts')}}/{{$post->id}}" method="GET">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            @endforeach
        </tbody>
    </table></div>  


@endsection