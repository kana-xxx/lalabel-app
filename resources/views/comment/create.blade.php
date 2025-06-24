<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('comment.store', [$company, $comment]) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name='company_id' value="{{$company->id}}">
    <input type="hidden" name='item_id' value="{{$item->id}}">
    @foreach ($company->items as $item)

    @endforeach
    <p>コメントの追加</p>

    @if(session('message'))
            {{session('message')}}
        @endif
    <div>
        <label for="title">タイトル</label>
        <input type="text" name="title">
    </div>

    <div>
        <label for="detail">詳細</label>
        <input type="text" name="detail">
    </div>



    <button type="submit">送信</button>
</form>
</body>
</html>