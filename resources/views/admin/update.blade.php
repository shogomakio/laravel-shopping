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
        <form action="{{route('admin.updateConfirm')}}" method="post">
            <div class="form-group">
                <label for="product_id">ID</label> 
                <input type="integer" id="product_id" name="product_id" class="form-control" readonly value="{{$product->product_id}}">
            </div>
            <div class="form-group">
                <label for="name">Product Name</label> 
                <input type="text" id="name" name="name" class="form-control" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="detail">Detail</label> 
                <input type="text" id="detail" name="detail" class="form-control" value="{{$product->detail}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label> 
                <input type="integer" id="price" name="price" class="form-control" value="{{$product->price}}">
            </div>
            <P>Status</p>
            <div class="form-group">
                <input type="radio" checked="checked" name="status" value="1">公開</input>
                <input type="radio" name="status" value="0">停止</input>
                <input type="radio" name="status" value="2">削除</input>
            </div>            
            <div class="form-group">
                <label for="image_path">Image Path</label> 
                <input type="text" id="image_path" name="image_path" class="form-control" value="{{$product->image_path}}">
            </div> 
            <table class="table">
                <tr>
                <td>
                    <p>Genre</p>
                    <select name="genre">
                        @foreach($genres as $genre)
                        <option value="{{$genre['genre_id']}}" >{{$genre['genre_name']}}</option>
                        @endforeach
                    </select>
                    </td>
                    <td>
                    <p>Brand</p>
                    <select name="brand">
                        @foreach($brands as $brand)
                        <option value="{{$brand['brand_id']}}" >{{$brand['brand_name']}}</option>
                        @endforeach
                    </select>
                    </td>
            </tr>
            </table>
            <hr>
            <button type="submit" class="btn btn-primary pull-right">Update</button>
            {{csrf_field()}}
        </form>
    </div>
</div>
@endsection