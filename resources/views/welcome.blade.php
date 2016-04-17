@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 logo">
            <img src= "/assets/imgs/weave_logo_naked.jpg" alt="Weave">        
            <h2>weave</h2>
            <p>Share. Buy. Support</p>
            <a class="btn btn-primary cta" href="{{ url('/products/1') }}">Explore</a>
        </div>
        <div class="content row">
            <div class="col-xs-6 col-sm-4 a">
                <img src= "/assets/imgs/mic.png" alt="Weave">        
                <h2>Share</h2>
                <p>Share your country's charity projects and "product of the day" to encourage 
people to cooperate! That countries' full market will be unlocked for that person. Build your map!</p>
            </div>
            <div class="col-xs-6 col-sm-4 a">
                <img src= "/assets/imgs/cart.png" alt="Weave">        
                <h2>Buy</h2>
                <p>Your purchase will support artisans from all over the world while contributing to social causes in the country of your heritage or the markets you unlock through sharing.</p>
            </div>
            <div class="col-xs-6 col-sm-4 a">
                <img src= "/assets/imgs/people.png" alt="Weave">        
                <h2>Support</h2>
                <p>Help others through value the work they already do, and make their
communities grow and build a stronger connection with what you care
about</p>
            </div>
            
    </div>
</div>

@endsection



