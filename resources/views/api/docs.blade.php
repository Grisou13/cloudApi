@extends('layouts.app')
@include('layouts.docs')
@section('content')
    <p>This page describes the HTTP api serving of the cloud service documentation.</p>
    <p>Here you will learn how to access your cloud from a third party application. It is like dropbox....so this is the developper part!</p>@if(isset($content))
      {!! $content or '<p> :( we\'re sorry there was a problem' !!}

@endsection