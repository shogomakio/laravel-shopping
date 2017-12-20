@extends('layouts.master') 
@section('title') EC サイト 
@endsection 
@section('content') 
     @if(Session::has('cart'))
        <form action="{{route('checkout')}}" method="post">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{$product['qty']}}</span>
                            <strong>{{$product['item']['name']}}</strong>
                            <span class="label-successs">{{$product['price']}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <hr>
         <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="Credit Card" name="radio" checked="checked">Credit Card
            </label>
        </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" id="inlineCheckbox2" value="Convenience" name="radio">Convenience Store
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" id="inlineCheckbox3" value="Cash" name="radio"> Cash
                </label>
            </div>
            </div>
            </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <button type="submit" class="btn btn-success">Checkout</button>
            </div>
        </div>
        {{csrf_field()}}
        </form>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No items in cart!</h2>
            </div>
        </div>
    @endif
@endsection