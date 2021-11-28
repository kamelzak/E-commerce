@extends('layouts.master')

@section('page_title')
    {{$product->title}}
@endsection

@section('content')
    
    <div class="col-md-12 mt-4">
        <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
        <div class="col p-2 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Design</strong>
            <h4 class="mb-0">{{$product->title}}</h4>
            <div class="mb-0 text-muted">{{$product->created_at->format('d/m/y')}}</div>
            <p class="card-text mb-auto">{!! $product->description !!}</p>
            <div class="d-flex justify-content-between">
                <div>
                    <strong class="card-text mb-auto">{{$product->getPrice()}}</strong>
                </div>
                <div>
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-info text-white"><i class="fa fa-cart-plus"></i> Add to cart</button>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="{{asset( 'storage/'.$product->photo)}}" alt="photo" width="200" height="250">
        </div>
        </div>
    </div>

@endsection