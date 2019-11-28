@extends('master')

@section('content')
{{-- {{dd($product)}}; --}}
<div class="row">
    <div class="col-12">
    <h1>{{ $product['ptitle'] }}</h1>
    <p><img width="500" src="{{ asset('images/' . $product['pimage']) }}"></p>
    <p>{!! $product['article'] !!}</p>
    <p><b>Price on site: </b> € {{ $product['price'] }}</p>
    <p>
    <button data-id="{{ $product['id'] }}" type="button" class="ml-3 btn btn-sm btn-outline-success add-to-cart"><i class="fas fa-cart-plus"></i>Add To Cart</button>
    <a class="btn btn-sm btn-outline-primary" href="{{ url('shop/checkout') }}">Continue To CheckOut</a>
    </p>
    </div>
</div>
@endsection