@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="app">
   
    <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
@endsection