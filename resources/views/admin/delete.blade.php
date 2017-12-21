@extends('layouts.adminMenu')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Update product</h1>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form action="{{route('admin.deleteConfirm')}}" method="post">
            <div class="form-group">
                <label for="product_id">ID</label> 
                <input type="integer" id="product_id" name="product_id" class="form-control" readonly value="{{$product->product_id}}">
            </div>
            <div class="form-group">
                <label for="name">Product Name</label> 
                <input type="text" id="name" name="name" class="form-control" readonly value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="detail">Detail</label> 
                <input type="text" id="detail" name="detail" class="form-control" readonly value="{{$product->detail}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label> 
                <input type="integer" id="price" name="price" class="form-control" readonly value="{{$product->price}}">
            </div>
            <P>Do you really want to delete this item?</p>
            {{--  <div class="form-group">
                <input type="radio" checked="checked" name="status" value="公開"
                <input type="radio" name="status" value="停止"
                <input type="radio" name="status" value="0"
            </div>            
            <div class="form-group">
                <label for="image_path">Image Path</label> 
                <input type="text" id="image_path" name="image_path" class="form-control">{{$product->image_path}}
            </div>   --}}
            <hr>
            <a href="{{route('admin.list')}}" type="button" class="btn btn-danger pull-left">No, take me back</a>
            <button type="submit" class="btn btn-success pull-right">Yes, delete it</button>
            {{csrf_field()}}
        </form>
    </div>
</div>
@endsection