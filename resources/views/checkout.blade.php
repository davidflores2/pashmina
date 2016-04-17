@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3 product-detail">
          <h1>Checkout</h1>
        	<form action="{{ ('orders') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group @if($errors->has('product')) has-error @endif">
            	<hr />
            	<h2>Guatemalan Rug</h2>
            	<strong>30.00 USD</strong>
             	<label for="name-field">Credit Card Number</label>
              <input type="number" id="product-field" name="product" class="form-control" value="{{ old("product") }}"/>
                 @if($errors->has("product"))
                  <span class="help-block">{{ $errors->first("product") }}</span>
                 @endif
              </div>
              <div class="form-group @if($errors->has('amount')) has-error @endif">
                 <label for="amount-field">Address</label>
              <input class="form-control" id="amount-field" name="amount">{{ old("amount") }}
                 @if($errors->has("amount"))
                  <span class="help-block">{{ $errors->first("amount") }}</span>
                 @endif
              </div>
              <div class="">
                  <button type="submit" class="btn btn-primary">Complete Checkout and Charge Card</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
