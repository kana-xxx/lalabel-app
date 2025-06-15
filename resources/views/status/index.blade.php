<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>ステータスの一覧</p>

@foreach ($statuses as $status)
<p>{{ $status->name }}</p>
@endforeach
    
</body>
</html>