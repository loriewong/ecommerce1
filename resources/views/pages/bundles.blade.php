@extends('layouts.app')

@section('title', 'Shop')

@section('content')

<div class="row" style="display:flex; flex-wrap: wrap;">
  @forelse($products as $product)
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src= "{{$product->image}}" style="height:200px" alt="...">
        <div class="caption">
          <h3>{{$product->name}}</h3>
          <h4>{{substr($product->description, 0,35) }} ... </h4>
          <h4>${{$product->price}}</h4>
          <!-- <p>{{$product->description}}</p> -->
          <p><a href="/bundle/{{$product->bundleId}}" class="btn btn-default" role="button">View</a></p>
        </div>
      </div>
    </div>
  @empty
    <h1>No products available.</h1>
  @endforelse

</div>
@endsection
