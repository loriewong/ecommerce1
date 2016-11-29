@extends('layouts.app')

@section('title', 'Shop')

@section('content')

<div class="row">
  @forelse($products as $product)
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src= "{{$product->image}}" alt="...">
        <div class="caption">
          <h4>{{$product->name}}</h4>
          <h3>${{$product->price}}</h3>
          <!-- <p>{{$product->description}}</p> -->
          <p><a href="/bundle/{{$product->bundleId}}" class="btn btn-default" role="button">View</a></p>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">
                Quick view
              </button>
              <!-- Modal -->
              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Add to cart</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

        </div>
      </div>
    </div>
  @empty
    <h1>No products available.</h1>
  @endforelse

</div>
@endsection
