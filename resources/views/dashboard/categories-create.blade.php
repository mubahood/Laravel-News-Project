@extends('layouts.admin')
@section('title')
    New Category
@endsection

@section('create-button')
    <a class="btn btn-danger mt-2" href="{{ route('categories') }}">LIST</a>
@endsection

@section('content')
    <form enctype="multipart/form-data" action="{{ route('categories_create') }}" method="post">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="name">News Category</label>
            <input required value="{{ old('name') }}" class="form-control" type="text" name="name"
                placeholder="Enter name" id="name">
            <p class="small text-danger">{{ $errors->first('name') }}</p>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input required class="form-control" type="file" name="photo" accept=".png,.jpg,.jpeg" id="photo">
        </div>

        <div class="form-group">
            <label for="details">Details</label>
            <textarea class="form-control" name="details" id="details">{{ old('name') }}</textarea>
        </div>


        <button type="submit" class="btn btn-success">SUBMIT</button>

    </form>
@endsection
