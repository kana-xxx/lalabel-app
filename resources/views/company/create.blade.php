<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('company.store') }}" enctype="multipart/form-data">
    @csrf
    <p>企業新規登録</p>

    @if(session('message'))
            {{session('message')}}
        @endif
    <div>
        <label for="name">企業名</label>
        <input type="text" name="name">
    </div>

    <div>
        <label for="address">住所</label>
        <input type="text" name="address">
    </div>

    <div>
        <label for="phone">電話番号</label>
        <input type="text" name="phone">
    </div>

    <div>
        <label for="note">その他</label>
        <input type="text" name="note">
    </div>

    <button type="submit">送信</button>
</form>
</body>
</html>