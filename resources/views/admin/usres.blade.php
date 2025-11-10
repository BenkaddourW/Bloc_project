@php
   use App\Models\Category; 
    
   $categories =new Category();
   $categories = $categories->get();

@endphp
@extends('admin.layout')
@section('content')
<div class="container mt-4">
    <h3>Categories </h3>

    <form action="{{url('/create_category')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryName" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
        
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Created by</th>
                <th>Created at</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example category row -->
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_by }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <form action="{{url('/del_category')}}/{{$category->id}}" method="GET">
                        @csrf
                        @method('DELETE')
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    


@endsection