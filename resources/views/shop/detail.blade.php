@extends('layouts.master') 
@section('title') EC サイト 
@endsection 
@section('content') 
{{--  @foreach($products->chunk(3) as $productsChunk)  --}}
<div class="row">
	{{--  @foreach($productsChunk as $product)  --}}
	<div class="col-sm-12 col-md-12">
		<div class="thumbnail">
			<img src="{{$product->image_path}}" alt="..." class="img-responsive">
			<div class="caption">
				<h3>{{$product->name}}</h3>
				<p class="description">{{$product->detail}} kys</p>
				<div class="clearfix">
					<div class="pull-left price">{{$product->price}}円</div>
                    <a href="{{URL::previous()}}" class="btn btn-warning pull-right" role="button">Go Back</a>
					<a href="{{route('product.AddToCart', ['product_id' => $product->product_id])}}" class="btn btn-success pull-right" role="button">Add to Chart</a>
				</div>
			</div>
		</div>
	</div>
	{{--  @endforeach  --}}
</div>
{{--  @endforeach   --}}
@endsection