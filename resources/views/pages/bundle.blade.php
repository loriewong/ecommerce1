@extends('layouts.app')

@section('title', 'Bundle')

@section('content')

<div class="row col-md-12" id="pages">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-8 ">
        <h2>{{ $bundle->name }}</h2>
        <img src= {{$bundle->image}} alt="...">
        <h3>Bundle Description</h3>
        <p>{{$bundle->description}}</p>
      </div>
      <div class="col-md-4 ">
        <bundleoptions
          :bundleitems="{{ $bundleitems }}"
          :bundle="{{ $bundle }}">
        </bundleoptions>
      </div>
    </div>
  </div>

</div>


@endsection

