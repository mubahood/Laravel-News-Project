@extends('layouts.admin')
@section('title')
    Posts
@endsection
@section('create-button')
    <a class="btn btn-success mt-2" href="{{ url('dashboard/posts/create') }}">NEW</a>
@endsection
@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Post</th>
                <th scope="col">Category</th>
                <th scope="col">Views</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>
                        <img class="img img-fluid rounded" style="width: 50px" src="{{ url('uploads/' . $item->photo) }}"
                            alt="">
                    </td>
                    <th scope="row">{{ $item->title }}</th>
                    <td>{{ $item->cat->name }}</td>
                    <td>{{ $item->views }}</td>
                </tr>
            @endforeach
        </tbody>

      {{--   {{ $posts->onEachSide(5)->links() }}
 --}}

    </table>
@endsection
