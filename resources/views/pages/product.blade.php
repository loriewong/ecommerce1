@extends('layouts.app')

@section('title', 'Product')

@section('content')

<div class="row">
  <h1>Showing {{ $product->name }}</h1>
  <img src= {{$product->image}} alt="...">
  <p>{{$product->description}}</p>
</div>

<div id="app">
  <productattributeprice :productattributes="{{ $product_attributes }}"></productattributeprice>
</div>

<script src="/js/app.js"></script>
<script src="/js/vue-cookie.js"></script>
@endsection

