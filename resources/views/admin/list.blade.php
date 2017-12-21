@extends('layouts.adminMenu')

@section('content')
{{--  <div class="row">  --}}
        <h1>Register product</h1>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <table class="table" style="margin-left:0px">
            <tr>    
                <td>ID</td>
                <td>Name</td>
                <td>Detail</td>
                <td>Price</td>
                <td>Status</td>
                <td>Image Path</td>
            </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product['product_id']}}</td>
                <td>{{$product['name']}}</td>
                <td>{{$product['detail']}}</td>
                <td>{{$product['price']}}</td>
                <td>{{$product['status']}}</td>
                <td>{{$product['image_path']}}</td>
        <form method="get"  action="{{route('admin.update', ['product_id' => $product->product_id])}}">
                <td><button type="submit" class="btn btn-primary pull-right">Update</button></td>
        </form>
        <form method="get"  action="{{route('admin.delete', ['product_id' => $product['product_id']])}}">
                <td><button type="submit" class="btn btn-warning pull-right">Delete</button></td>
        </form>
            </tr>
        @endforeach
            </table>
            <hr>
            {{csrf_field()}}
{{--  </div>  --}}
@endsection