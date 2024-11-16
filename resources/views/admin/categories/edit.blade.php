@extends('admin.dashbord')

@section('title', 'edit categories')

@section('edit-category')
    <div class="container">
        <h1>Edit category</h1>
        @if ($errors->any())
                <ul class="ul-error">
                    @foreach ($errors->all() as $error)
                        <li class="li-error">{{ $error }}</li>
                    @endforeach
                </ul>
        @endif
        <form method="POST" action="{{ route('categories.edit', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                {{-- {{ $category }} --}}
                <label for="name" class="form-label">Category name</label>
                <input type="text" class="form-control mb-3" id="name" name="category_name" value="{{ $category->category_name }}">
                <label for="description" class="form-label">Category description</label>
                <input type="text" class="form-control mb-3" id="description" name="category_description" value="{{ $category->description }}">
                <lable for="image" class="form-label">Category imade</lable>
                <input type="file" class="form-control" id="image" name="category_image">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

