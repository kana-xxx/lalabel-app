<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>担当者の一覧</p>

@if(session('message'))
            {{session('message')}}
@endif

@foreach ($people as $person)

<ul>
<a href="{{route('person.show', $person)}}"><li>{{ $person->name }}</li></a>
</ul>
@endforeach
    
</body>
</html>