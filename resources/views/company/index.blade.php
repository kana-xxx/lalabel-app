<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<body>

@auth
        <p class="text-center">ログイン中: {{ Auth::user()->name }}</p>
    @endauth

    <div class="d-flex justify-content-center">
        @auth
        <form class="text-center mt-4" action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger mx-2">ログアウト</button>
    </form>
        @else
        @endauth
    </div>

<header>
<a href="{{route('company.index')}}">企業一覧</a>
<a href="{{route('person.index')}}">担当者一覧</a>
</header>


@if(session('message'))
            {{session('message')}}
@endif

<p>企業一覧</p>

<div>
  <form action="{{ route('company.index') }}" method="GET">
    <input type="text" name="searchword" value="{{$searchword}}"  class="form-control mr-sm-2" placeholder="キーワードを入力">
    <button type="submit" class="search-box btn btn-info">検索</button>
  </form>
</div>


<a class="btn" href="{{route('company.create')}}">企業新規追加</a>


<div>
@foreach ($companies as $company)
<ul>
    <a href="{{route('company.show', $company)}}"><li>{{ $company->name }}</li></a>
</ul>
@endforeach
</div>
{{ $companies->links() }}
    
</body>
</html>