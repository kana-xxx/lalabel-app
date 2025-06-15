<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('status.update', $status) }}"  enctype="multipart/form-data">
    @csrf
    @method('patch')
    <p>ステータスの編集</p>

    @if(session('message'))
            {{session('message')}}
        @endif
    <div>
        <label for="name">名前</label>
        <input type="text" name="name" value="{{old('name', $status->name)}}">
    </div>
    <button type="submit">送信</button>
</form>

</body>
</html>