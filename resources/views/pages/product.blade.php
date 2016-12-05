@extends('layouts.app')

@section('title', 'Product')

@section('content')

<div class="row col-md-12" id="pages">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-8 ">
        <h2>{{ $product->name }}</h2>
        <img src= {{ $product->image }} alt="...">
        <h3>Product Description</h3>
        <p>{{ $product->description }}</p>
      </div>
      <div class="col-md-4 ">
          <productattributeprice
            :productattributes="{{ $product_attributes }}"
            :product="{{ $product }}">
          </productattributeprice>
      </div>
    </div>
  </div>
</div>

@endsection

