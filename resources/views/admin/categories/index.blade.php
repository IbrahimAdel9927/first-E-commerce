@extends('admin.dashbord')

@section('title', 'categories')

@section('categories')
    <div class="container">
        <h1>ALL categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">Create new category</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <img src="{{ asset("storage/images/categories/$category->image") }}" alt="category image" style="width: 100px; height: 100px;">
                        </td>
                        <td>
                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary me-5">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </div>
@endsection