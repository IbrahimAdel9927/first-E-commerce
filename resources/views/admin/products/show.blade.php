@extends('admin.dashbord')

@section('title', 'show product')

@section('show-product')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        {{-- <h1>{{ $product->product_name }}</h1> --}}
        <div class="card mb-3" style="width: 18rem;">
            <img src="{{ asset("storage/images/products/$product->image") }}" class="card-img-top" alt="product image">
            <div class="card-body mt-auto">
                <h5 class="card-title">{{ $product->product_name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <span style="font-weight: bold;"><p class="card-text">{{ $product->price }} E£</p></span>
            </div>
        </div>
        {{-- <div>
            <a href="{{ route('') }}"><i class="fas fa-shopping-cart"></i></a>
        </div> --}}
    </div>
@endsection

