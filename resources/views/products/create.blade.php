@extends('layouts.app')

@section('header')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Products / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

            <form action="{{ route('products.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <textarea class="form-control" id="description-field" rows="3" name="description">{{ old("description") }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('price')) has-error @endif">
                       <label for="price-field">Price</label>
                    <input type="text" id="price-field" name="price" class="form-control" value="{{ old("price") }}"/>
                       @if($errors->has("price"))
                        <span class="help-block">{{ $errors->first("price") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('countryoforigin')) has-error @endif">
                       <label for="countryoforigin-field">Country Of Origin</label>
                    <input type="text" id="countryoforigin-field" name="countryOfOrigin" class="form-control" value="{{ old("countryOfOrigin") }}"/>
                       @if($errors->has("countryoforigin"))
                        <span class="help-block">{{ $errors->first("countryoforigin") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('products.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
