@extends('layouts.admin')
@section('title')
    New Post
@endsection

@section('create-button')
    <a class="btn btn-danger mt-2" href="{{ url('dashboard/posts') }}">LIST</a>
@endsection

@section('content')
    <form enctype="multipart/form-data" action="{{ url('dashboard/posts') }}" method="post">
        {!! csrf_field() !!}
        {{-- 
    	
user_id	

    --}}
        <div class="form-group">
            <label for="title">Post title</label>
            <input required value="{{ old('title') }}" class="form-control" type="text" name="name"
                placeholder="Enter title" id="title">
            <p class="small text-danger">{{ $errors->first('title') }}</p>
        </div>

        <div class="form-group">
            <label for="news_category_id">Category</label>
            <select required class="form-control" name="news_category_id" id="news_category_id">
                @foreach ($cats as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input required class="form-control" type="file" name="photo" accept=".png,.jpg,.jpeg" id="photo">
        </div>


        <div class="form-group">
            <label for="body">News Content</label>
            <textarea class="form-control" name="body" id="body">{{ old('name') }}</textarea>
        </div>


        <button type="submit" class="btn btn-success">SUBMIT</button>

    </form>
@endsection
