<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .comment_list {
        list-style-type: none;
        display: flex;
        align-items: center;
        column-gap: 1rem;
        border-bottom: 1px solid #ddd;
        width: 70%;
    }
    </style>
<body>



<p>案件の詳細</p>

@if(session('message'))
            {{session('message')}}
@endif


<div>
<p>{{ $company->name }}：{{ $item->name }}</p>
   

コメント一覧


<a href="{{route('comment.create', [$comment , $company->id, $item->id])}}">コメント投稿</a>

@foreach ($item->comments as $comment)

<ul class="comment_list">
    <li>{{ $comment->title }}</li>
    <li>{{ $comment->detail }}</li>
    <li>{{ $comment->user->name }}</li>

</ul>


@endforeach
</div>



<div>

</div>
    
</body>
</html>