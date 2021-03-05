@extends('layouts.app')

@section('content')

	@include('partials.page-header')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if (Auth::check())
            
        @else
           
        @endif
        
        
    </div>
</div>
 <!--    <div class="row justify-content-center">
        <div class="col-md-8">
            <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div> -->

@endsection
