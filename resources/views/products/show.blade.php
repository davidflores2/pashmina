@extends('layouts.app')
@section('header')
@section('content')
    
<div class="col-md-6 col-md-offset-3 product-detail">
    <h1>{{$product->name}}</h1>
     <div class="col-md-12">
        <img src="/assets/imgs/rug.png" alt="Rug">    
     </div>
     <small class="country">Origin: {{$product->countryOfOrigin}}</small>
     <br/>
     <strong>Description</strong>
     <p class="description">{{$product->description}}</p>
     <p class="price">{{$product->price}} USD</p>
     <a href="{{ url('checkout/') }}" class="btn btn-primary cta">Buy Now</a>
     <br />
</div>
<div class="col-md-6 col-md-offset-3">
    <a class="btn btn-link" href="{{ route('products.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>    
</div>

<!--
<form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('products.edit', $product->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
-->
@endsection
@endsection