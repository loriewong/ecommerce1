@extends('layouts.app')

@section('title', 'Product')

@section('content')

<div class="row">
  <h1>Showing {{ $product->name}}</h1>
  <img src= {{$product->imageurl}} alt="...">
  <p>{{$product->description}}</p>
  

  NEED TO MAKE DROPDOWN FOR SIZE AND HOOKUP TO DATABASE
</div>
@endsection
