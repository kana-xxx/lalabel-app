<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>コメントの一覧</p>

@foreach ($comments as $comment)
<p>{{ $comment->title }}</p>
@endforeach
    
</body>
</html>