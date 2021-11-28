@extends('layouts.master')

@section('page_title')
    Products
@endsection

@section('content')

    <div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @foreach (App\Models\Category::all() as $category)
                        <a class="nav-link text-dark" href="{{ route('products.index', ['category' => 
                        $category->slug]) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </nav>
    </div>

    @foreach ($products as $product)
    <div class="col-md-4">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-2 d-flex flex-column position-static">
            <strong class="d-inline-block mb-1 text-success">
                @foreach ($product->categories as $category)
                    {{ $category->name }}@if(!$loop->last), @endif
                @endforeach
            </strong>
            <h5 class="mb-0">{{$product->title}}</h5>
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
    {{ $products->appends(request()->input())->links() }}

@endsection
