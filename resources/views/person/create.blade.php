<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('person.store', $company) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name='company_id' value="{{$company->id}}">
    <p>担当者新規登録</p>

    @if(session('message'))
            {{session('message')}}
        @endif
    <div>
        <label for="name">名前</label>
        <input type="text" name="name">
    </div>

    <div>
        <label for="department">部署</label>
        <input type="text" name="department">
    </div>

    <div>
        <label for="position">役職</label>
        <input type="text" name="position">
    </div>

    <div>
        <label for="email">email</label>
        <input type="text" name="email">
    </div>

    <div>
        <label for="phone">電話</label>
        <input type="text" name="phone">
    </div>

    <button type="submit">送信</button>
</form>
</body>
</html>