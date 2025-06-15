<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('status.store') }}" enctype="multipart/form-data">
    @csrf
    <p>ステータスの作成</p>

    @if(session('message'))
            {{session('message')}}
        @endif
    <div>
        <label for="name">ステータスの名前</label>
        <input type="text" name="name">
    </div>

    <button type="submit">送信</button>
</form>
</body>
</html>