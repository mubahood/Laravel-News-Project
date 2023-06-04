@extends('layouts.main')
@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <img class="card-img-top" src="{{ url('uploads/' . $post->photo) }}" alt="Card image cap">
    <hr>
    {{ $post->body }}
@endsection
