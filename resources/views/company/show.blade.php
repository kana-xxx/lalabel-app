<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>企業詳細表示</p>

@if(session('message'))
            {{session('message')}}
@endif

<div>
<a href="{{route('company.edit', $company)}}">企業の編集</a>
<form method="post" action="{{route('company.destroy', $company)}}">
                    @csrf
                    @method('delete')
                    <button onClick="return confirm('本当に削除しますか？');">削除</button>
</form>

<ul>
    <li>{{ $company->name }}</li>
    <li>{{ $company->address }}</li>
    <li>{{ $company->phone }}</li>
    <li>{{ $company->note }}</li>
</ul>


    @if ($company->people->count())
<div>
    <p>担当者一覧</p>

    <form method="post" action="{{ route('company.register', $company) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name='company_id' value="{{$company->id}}">
    <button type="submit">担当者登録</button>
</form>

    <ul>
    <li>
        {{-- 担当者表示 --}}
@foreach ($company->people as $person)
    <a href="{{route('person.show', $person)}}">{{ $person->name }}</a>
                @endforeach
            </li>
            </ul>
</div>
            @else
            @endif
            

</div>
<div>
</div>
    
</body>
</html>