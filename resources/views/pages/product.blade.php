@extends('layouts.app')

@section('title', 'Product')

@section('content')

<div class="row">
  <h1>Showing {{ $product->name }}</h1>
  <img src= {{$product->image}} alt="...">
  <p>{{$product->description}}</p>

<!--   <div class="col-md-2">
    Size:
    <select id="service_status" name="service_status">
      @foreach($product_attributes as $item)
        <option value={{$item->attributeId}}>{{ $item->size }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-2">
    Price: need some variable
  </div> -->
  <button type="button" class="btn btn-primary">Add to cart</button>
</div>

<div id="app">

<productattributeprice productattributes="{{ $product_attributes }}"></productattributeprice>
</div>

<script src="/js/app.js"></script>
@endsection

