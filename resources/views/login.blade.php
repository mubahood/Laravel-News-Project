@extends('layouts.main')
@section('title')
    Login or Create account
@endsection


@section('content')
    <hr>
    <div class="row">
        <div class="col-md-6 mb-md-3">
            <h2 class="text-center">REGISTER</h2>
            <form action="{{ route('register') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input required value="{{ old('name') }}" class="form-control" type="text" name="name"
                        placeholder="name" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input required value="{{ old('email') }}" class="form-control" type="email" name="email"
                        placeholder="Email address" id="email">
                    <p class="small text-danger">{{ $errors->first('email') }}</p>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input required class="form-control" type="password" name="password" placeholder="Enter password"
                        id="password">

                    <p class="small text-danger">{{ $errors->first('password') }}</p>
                </div>

                <div class="form-group">
                    <label for="password_2">Re-enter Password</label>
                    <input required class="form-control" type="password" name="password_2" placeholder="RE-Enter password"
                        id="password_2">
                </div>

                <button type="submit" class="btn btn-danger">REGISTER</button>

            </form>
        </div>
        <div class="col-md-6 mb-md-3">
            <h2 class="text-center">LOGIN</h2>
            <form action="{{ route('login') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input required value="{{ old('login_email') }}" class="form-control" type="email" name="login_email"
                        placeholder="Email address" id="email">
                    <p class="small text-danger">{{ $errors->first('email') }}</p>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input required class="form-control" type="password" name="login_password" placeholder="Enter password"
                        id="password">

                    <p class="small text-danger">{{ $errors->first('login_password') }}</p>
                </div>


                <button type="submit" class="btn btn-success">LOGIN</button>

            </form>
        </div>
    </div>
@endsection
