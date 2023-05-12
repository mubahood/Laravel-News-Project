<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>@yield('title')</h1>
    <p><a href="{{ route('home') }}">HOME</a></p>
    <p><a href="{{ route('about') }}">ABOUT US</a></p>
    <p><a href="{{ route('contact') }}">CONTACT US</a></p>

    <head><u>MODEL</u></head>
    <p><a href="{{ route('model-saving') }}">Saving</a></p>
    <p><a href="{{ route('model-querying') }}">Querying</a></p>
    <p><a href="{{ route('model-relationships') }}">Relationships</a></p>

    <hr>
    @yield('content')
</body>

</html>
