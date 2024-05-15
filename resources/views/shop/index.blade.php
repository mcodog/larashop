@extends('layouts.master')
@section('title')
    laravel shopping cart
@endsection
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-primary alert-dismissible  show" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- @include('layouts.flash-messages') --}}
    @if (Session::has('message'))
        <div class="alert alert-danger alert-dismissible  show" role="alert">
            <strong>{{ Session::get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert " aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @foreach ($items->chunk(4) as $itemChunk)
        <div class="row">
            @foreach ($itemChunk as $item)
                <div class="col-sm-6 col-md-4">
                    <div class="card border-dark">
                        <img src="{{ asset($item->img_path) }}" alt="..." class="card-img-top text-center" style="width: 10rem; margin:auto">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span style="color:gray">Product Description: </span>{{ $item->name }}</li>
                            <li class="list-group-item"><span style="color:gray">Product Price: </span>${{ $item->sell_price }}</li>
                        </ul>
                        <div class="card-footer text-white bg-dark text-center">

                            <div class="clearfix">
                                {{-- <a href="#" class="btn btn-light" role="button"><i class="fas fa-cart-plus"></i>
                                    Add to Cart</a> --}}
                                <a href="{{ route('addToCart', $item->item_id) }}" class="btn btn-light" role="button"><i class="fas fa-cart-plus"></i> Add to Cart</a> 

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    @endforeach
@endsection
