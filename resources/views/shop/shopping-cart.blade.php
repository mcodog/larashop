@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
{{--dd($products)--}}
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                            <li class="list-group-item d-flex justify-content-around">
                                <span class="badge">{{ $product['qty'] }}</span>
                                <strong>{{ $product['item']['name'] }}</strong>
                                <span class="label label-success">${{ $product['item']['sell_price'] }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      
                                        <li><a href="{{ route('reduceByOne',$product['item']['item_id']) }}">Reduce By 1</a></li>
                                        <li><a href="{{ route('removeItem',$product['item']['item_id']) }}">Reduce All</a></li>

                                        {{-- <li><a href="#">Reduce By 1</a></li>  --}}
                                         {{-- <li><a href="#">Reduce All</a></li> --}}
                                    </ul>
                                </div>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: ${{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                 <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
                 {{-- <a href="#" type="button" class="btn btn-success">Checkout</a> --}}
                
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
        </div>
    @endif
@endsection