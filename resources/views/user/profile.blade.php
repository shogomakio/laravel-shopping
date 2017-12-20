@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
            @foreach($purchases as $array)
                <ul class="list-group">
                {{--  @foreach($order->cart->items as $item)
                    <li class="list-group-item">
                        <span class="badge">{{$item['price']}}</span>
                        {{$item['item']['title']}} | {{$item['qty']}} Units
                    </li>
                @endforeach  --}}
                <li class="list-group-item">
                    <span class="badge">{{$array['purchase_date']}}</span>
                </li>
                <li class="list-group-item">
                    <span class="badge">{{$array['payment_type']}}</span>
                </li>
                </ul>
            @endforeach
            </div>
            <div class="panel-footer">
                {{--  <storng>Total Price: {{$order->cart->totalPrice}}</strong>  --}}
            </div>
        </div>
    </div>
</div>
@endsection