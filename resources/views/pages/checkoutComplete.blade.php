@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div id="pages">
  <div class="row">
    <h2>Order received! We will process your order as soon as possible. We will notify you when your order ships.</h2>
  </div>
</div>

@endsection

<script type="text/javascript">
    localStorage.clear('shoppingCart');
</script>