@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<body>
    <div class="container">
        <div class="content">
            <div class="title"></div>
            
            <a class="btn btn-info" href="auth/facebook" role="button">Login with Facebook</a>
        </div>
    </div>
</body>
