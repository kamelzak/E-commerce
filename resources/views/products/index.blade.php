@extends('layouts.master')

@section('page_title')
    Products
@endsection

@section('content')

    @foreach ($products as $product)
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success">Design</strong>
                <h4 class="mb-0">{{$product->title}}</h4>
                <div class="mb-1 text-muted">{{$product->created_at->format('d/m/y')}}</div>
                <p class="card-text mb-auto">{{$product->subtitle}}</p>
                <strong class="card-text mb-auto">{{$product->getPrice()}}</strong>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-info stretched-link text-white">Go to article</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="{{$product->photo}}" alt="photo">
            </div>
            </div>
        </div>
    @endforeach

@endsection
