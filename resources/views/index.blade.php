@extends('layouts.main')
@section('title')
    HOME PAGE.
@endsection
 
@section('content')
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                @include('components.post-ui', [
                    'post' => $post,
                ])
            </div>
        @endforeach
    </div>
@endsection
