@extends('admin.dashbord')

@section('title', 'create products')

@section('create-product')
    <div class="container">
        <h1>Create new product</h1>
        @if ($errors->any())
                <ul class="ul-error">
                    @foreach ($errors->all() as $error)
                        <li class="li-error">{{ $error }}</li>
                    @endforeach
                </ul>
        @endif
        <form method="POST" action="{{ route('adminproducts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product name</label>
                <input type="text" class="form-control mb-3" id="name" name="product_name">
                <label for="description" class="form-label">Product description</label>
                <input type="text" class="form-control mb-3" id="description" name="product_description">
                <label for="price" class="form-label">Product price</label>
                <input type="text" class="form-control mb-3" id="price" name="product_price">
                <label for="image" class="form-label">Product image</label>
                <input type="file" class="form-control mb-3" id="image" name="product_image">
                <label for="category_id" class="form-label">category name</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection

