@extends('user.home')

@section('title', 'products')

@section('user-products')
<div class="container">
    {{-- <h1>Products</h1> --}}
</div>
<div class="container d-flex flex-wrap gap-3" id="gap-toggle">
    @if (count($products) == 0)
        <h1 class="text-center" style="width: 100%;">No products found</h1>
    @else
        @foreach ($products as $product)
            <div class="card position-relative mb-3">
                <a class="card border-none" style="width: 15rem;" href="{{ route('products.show', $product->id) }}">
                    <img src="{{ asset("storage/images/products/$product->image") }}" class="card-img-top" alt="product image">
                    <div class="card-body mt-auto">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 10, '...') }}</p>
                        <span style="font-weight: bold;"><p class="card-text">{{ $product->price }} E£</p></span>
                    </div>
                </a>
            </div>
        @endforeach
    @endif
</div>
<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
@endsection