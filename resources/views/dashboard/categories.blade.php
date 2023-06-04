@extends('layouts.admin')
@section('title')
    categories
@endsection
@section('create-button')
    <a class="btn btn-success mt-2" href="{{ route('categories-create') }}">NEW</a>
@endsection
@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Category</th>
                <th scope="col">Posts</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>
                        <img
                        class="img img-fluid rounded"
                        style="width: 50px"
                        src="{{ url('uploads/' . $item->photo) }}" alt="">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>---</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
