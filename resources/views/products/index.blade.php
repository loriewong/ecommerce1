@extends('layouts.app')
@section('title', 'Products')

@section('content')
<div class="row">
  @foreach($products as $product)
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src= {{$product->imageurl}} alt="...">
        <div class="caption">
          <h3>{{$product->name}}</h3>
          <p>{{$product->description}}</p>
          <p><a href="#" class="btn btn-default" role="button">Button</a></p>
        </div>
      </div>
    </div>
  @endforeach
</div>
@stop



