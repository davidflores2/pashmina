@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
          <div class="panel-heading">Checkout</div>
          	<form action="{{ ('orders') }}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group @if($errors->has('product')) has-error @endif">
               	<label for="name-field">Product</label>
                <input type="text" id="product-field" name="product" class="form-control" value="{{ old("product") }}"/>
                   @if($errors->has("product"))
                    <span class="help-block">{{ $errors->first("product") }}</span>
                   @endif
                </div>
                <div class="form-group @if($errors->has('amount')) has-error @endif">
                   <label for="amount-field">Amount</label>
                <textarea class="form-control" id="amount-field" name="amount">{{ old("amount") }}</textarea>
                   @if($errors->has("amount"))
                    <span class="help-block">{{ $errors->first("amount") }}</span>
                   @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection
