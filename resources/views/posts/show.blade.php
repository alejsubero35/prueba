@extends('layouts.app')

@section('content')
    <div class="container">
        <post :post="{{ $post }}" :user="{{ auth()->user() ?? json_encode([]) }}"></post>
    </div>
@endsection
