<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="http://127.0.0.1:8000">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>@yield('title')</title>
</head>

<body class="container pt-0 mt-0">

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="{{ route('dashboard') }}">DASHBOARD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('') }}">WEBSITE<span class="sr-only">(current)</span></a>
                </li>


            </ul>
            <a class="nav-link btn btn-sm btn-danger" href="{{ route('logout') }}">logout</a>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-4">
            <div class="list-group rounded-0">
                <a href="#" class="list-group-item list-group-item-action">
                    CREATE NEWS POST
                </a>
                <a href="{{ url('dashboard/posts') }}" class="list-group-item list-group-item-action">
                    NEWS POSTS
                </a>
                <a href="{{ route('categories') }}" class="list-group-item list-group-item-action">
                    NEWS CATEGORIES
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h1">@yield('title')</h1>
                </div>
                <div class="col-md-2">
                    @yield('create-button')
                </div>
            </div>
            @yield('content')
        </div>
    </div>





</body>

</html>
