<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('person.update', $person) }}"  enctype="multipart/form-data">
    @csrf
    @method('patch')
    <p>こめんんとの編集</p>

    @if(session('message'))
            {{session('message')}}
        @endif
    <div>
        <label for="name">名前</label>
        <input type="text" name="name" value="{{old('name', $person->name)}}">
    </div>

    <div>
        <label for="name">企業ID</label>
        <input type="text" name="company_id" value="{{old('company_id', $person->company_id)}}">
    </div>

    <div>
        <label for="department">部署</label>
        <input type="text" name="department" value="{{old('department', $person->department)}}">
    </div>

    <div>
        <label for="position">役職</label>
        <input type="text" name="position" value="{{old('position', $person->position)}}">
    </div>

    <div>
        <label for="email">email</label>
        <input type="text" name="email" value="{{old('email', $person->email)}}">
    </div>

    <div>
        <label for="phone">電話</label>
        <input type="text" name="phone" value="{{old('phone', $person->phone)}}">
    </div>

    <button type="submit">送信</button>
</form>

</body>
</html>