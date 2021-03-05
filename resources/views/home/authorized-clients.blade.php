@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="app">
        <passport-authorized-clients></passport-authorized-clients>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
@endsection