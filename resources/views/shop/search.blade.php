@extends('layouts.master')

@section('content')
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        {{--  <table class="table" style="margin-left:0px">
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
        <form method="get"  action="{{route('product.detail', ['product_id' => $product->product_id])}}">
                <td><button type="submit" class="btn btn-primary pull-right">Details</button></td>
        </form>
            </tr>
        @endforeach
        </table>  --}}

        @foreach($products->chunk(3) as $productsChunk)
<div class="row">
	@foreach($productsChunk as $product)
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<a href="{{route('product.detail', ['product_id' => $product->product_id])}}"><img src="{{$product->image_path}}" alt="..." class="img-responsive"></a>
			<div class="caption">
				<h3>{{$product->name}}</h3>
				<p class="description">{{$product->detail}} kys</p>
				<div class="clearfix">
					<div class="pull-left price">{{$product->price}}円</div>
					<a href="{{route('product.AddToCart', ['product_id' => $product->product_id])}}" class="btn btn-success pull-right" role="button">Add to Chart</a>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endforeach


            <hr>
            {{csrf_field()}}
@endsection