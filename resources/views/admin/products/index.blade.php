@extends('admin.dashbord')

@section('title', 'products')

@section('products')
    <div class="container">
        <h1>Products</h1>
        <a href="{{ route('adminproducts.create') }}" class="btn btn-primary mb-4">Create new product</a>
    </div>
    <div class="container d-flex flex-wrap gap-toggle" id="gap-toggle">
        @foreach ($products as $product)
            <div class="card position-relative card-mb mb-3">
                <a class="card border-none position-relative" style="width: 15rem;" href="{{ route('adminproducts.show', $product->id) }}">
                    <img src="{{ asset("storage/images/products/$product->image") }}" class="card-img-top" alt="product image">
                    <div class="card-body mt-auto">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 10, '...') }}</p>
                        <span style="font-weight: bold;"><p class="card-text">{{ $product->price }} E£</p></span>
                    </div>
                </a>
                <div class="card-footer">
                    <form class="d-flex justify-content-around" method="POST" action="{{ route('adminproducts.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('adminproducts.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection