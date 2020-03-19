@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Products</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('product.jpg') }}" alt="" class="card-img-top img-fluid">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                    <div class="card-body">
                        <a href="">Add to cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
