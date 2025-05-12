<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('company.update', $company) }}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <p>企業の編集</p>

    @if(session('message'))
            {{session('message')}}
        @endif
    <div>
        <label for="name">企業名</label>
        <input type="text" name="name" value="{{old('name', $company->name)}}">
    </div>

    <div>
        <label for="address">住所</label>
        <input type="text" name="address" value="{{old('address', $company->address)}}">
    </div>

    <div>
        <label for="phone">電話番号</label>
        <input type="text" name="phone" value="{{old('phone', $company->phone)}}">
    </div>

    <div>
        <label for="note">その他</label>
        <input type="text" name="note" value="{{old('note', $company->note)}}">
    </div>

    <button type="submit">更新</button>
</form>
</body>
</html>