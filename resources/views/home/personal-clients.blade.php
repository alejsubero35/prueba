@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="app">
        <passport-clients></passport-clients>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
@endsection