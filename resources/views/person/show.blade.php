<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>担当者の詳細</p>

@if(session('message'))
            {{session('message')}}
@endif


<div>
<ul>
    <li><a href="/company/{{ $person->company->id }}">{{ $person->company->name }}</a></li>
    <li>{{ $person->name }}</li>
    <li>{{ $person->department }}</li>
    <li>{{ $person->position }}</li>
    <li>{{ $person->email }}</li>
    <li>{{ $person->phone }}</li>
</ul>
</div>

<form method="post" action="{{route('person.destroy', $person)}}">
                    @csrf
                    @method('delete')
                    <button onClick="return confirm('本当に削除しますか？');">削除</button>
</form>

<a href="{{route('person.edit', $person)}}">編集</a>


<div>

</div>
    
</body>
</html>