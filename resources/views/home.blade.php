<?php
$project_name = '<br>Simple<br>project.';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
</head>

<body>
    <h1>Welcome to <b>{!! $project_name !!}</b></h1>
    <p>Welcome to home of this project!</p>
    <hr>
    <p><b>NAME:</b> {{ $name }}</p>
    <p><b>SEX:</b> {{ $sex }}</p>
    <?php print_r($colors); ?>

    @if (1 > 2)
        <p>One is less than two</p>
    @else
        <p>One is not greater than two</p>
    @endif 

    @foreach ($colors as $color)
        <p>{{ $color }}</p>
    @endforeach


    @for ($i = 0; $i < 100; $i++)
        <p>{{ $i }}</p>
    @endfor
 
</body>

</html>
