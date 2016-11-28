@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div>
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Customer Information</h2>
            <form class="form-horizontal" role="form" method="POST" action="/checkout">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter First Name" value="{{ old('firstname') }}">
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter Last Name" value="{{ old('lastname') }}">
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                <span class="text-danger">{{ $errors->first('email') }}</span>
              </div>

              <div class="form-group">
                <button class="btn btn-success">Submit</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Order Summary</h2>
          <div class="row">
            <shoppingcartsummary></shoppingcartsummary>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>

      @if(Session::has('message'))
          <div class="alert alert-info">
            {{Session::get('message')}}
          </div>
      @endif
    </div>

    <div class="col-md-6">
    </div>
  </div>
</div>


@endsection
