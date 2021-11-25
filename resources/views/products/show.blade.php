@extends('layouts.master')

@section('page_title')
    {{$product->title}}
@endsection

@section('content')
    
    <div class="col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Design</strong>
            <h4 class="mb-0">{{$product->title}}</h4>
            <div class="mb-1 text-muted">{{$product->created_at->format('d/m/y')}}</div>
            <p class="card-text mb-auto">{{$product->description}}</p>
            <strong class="card-text mb-auto">{{$product->getPrice()}}</strong>
            <div class="mt-3">
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-dark">Add to cart</button>
                </form>
            </div>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="{{$product->photo}}" alt="photo">
        </div>
        </div>
    </div>

@endsection