@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

            </div>
            <div class="badge">
                token : <i>{{ JWTAuth::fromUser(Auth::user()) }}</i>
            </div>

            {!! Form::open(array('url' => '/api/v1/file',"files"=>true)) !!}
                {!! Form::hidden("token",JWTAuth::fromUser(Auth::user())) !!}
                {!! Form::file("upload") !!}
                {!! Form::text("filename") !!}
                {!! Form::submit() !!}
            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
