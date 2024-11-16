@extends('admin.dashbord')

@section('title', 'create categories')

@section('create-category')
    <div class="container position-relative">
        <h1>Create new category</h1>
        @if ($errors->any())
                <ul class="ul-error">
                    @foreach ($errors->all() as $error)
                        <li class="li-error">{{ $error }}</li>
                    @endforeach
                </ul>
        @endif
        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category name</label>
                <input type="text" class="form-control mb-3" id="name" name="category_name">
                <label for="description" class="form-label">Category description</label>
                <input type="text" class="form-control mb-3" id="description" name="category_description">
                <lable for="image" class="form-label">Category image</lable>
                <input type="file" class="form-control" id="image" name="category_image">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection

