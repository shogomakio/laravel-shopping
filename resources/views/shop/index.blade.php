@extends('layouts.master') 
@section('title') EC サイト 
@endsection 
@section('content') 
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
@endforeach @endsection