@extends('layouts.main')
@section('title')
    HOME PAGE
@endsection


@section('content')
    <p>HOME CONTENT</p>

    @for ($i = 0; $i < 10; $i++)
        @include('components.product-ui', [
            'id' => $i,
        ])
    @endfor

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil nemo laborum dolores quisquam. Doloremque, explicabo.
        Quisquam labore repudiandae incidunt magnam. Nobis aperiam delectus error, adipisci maiores praesentium dignissimos
        at soluta.</p>
@endsection
