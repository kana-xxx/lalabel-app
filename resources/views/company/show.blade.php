<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>企業詳細表示</p>

@if(session('message'))
            {{session('message')}}
@endif

<div>
<a href="{{route('company.edit', $company)}}">企業の編集</a>
<form method="post" action="{{route('company.destroy', $company)}}">
                    @csrf
                    @method('delete')
                    <button onClick="return confirm('本当に削除しますか？');">削除</button>
</form>

<ul>
    <li>{{ $company->name }}</li>
    <li>{{ $company->address }}</li>
    <li>{{ $company->phone }}</li>
    <li>{{ $company->note }}</li>
</ul>


    @if ($company->people->count())
<div>
    <p>担当者一覧</p>

    <form method="post" action="{{ route('company.register', $company) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name='company_id' value="{{$company->id}}">
    <button type="submit">担当者登録</button>
</form>

    <ul>
    <li>
        {{-- 担当者表示 --}}
@foreach ($company->people as $person)
    <a href="{{route('person.show', $person)}}">{{ $person->name }}</a>
                @endforeach
            </li>
            </ul>
</div>
            @else
            @endif



            @if ($company->items->count())

    <p>案件</p>

            @foreach ($company->items as $item)

    <form method="post" action="{{route('item.detach', $company)}}">
                    @csrf
                    @method('patch')

                    <p>{{ $item->name }}</p> 
                    <input type="hidden" name="item" value="{{$item->id}}">
                    <input type="hidden" name='company_id' value="{{$company->id}}">
                    <button class="btnroler">
                        削除
                    </button>
                </form>

                @endforeach

            

                  <form method="post" action="{{route('item.attach', $company)}}">
                    @csrf
                    @method('patch')
                    <select name="item_id" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                    @foreach ($items as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name='company_id' value="{{$company->id}}">
                    <button class="btnroleb">
                        案件追加
                    </button>
                </form>
                

                @else
                @endif
 
          </div>
                </div>
                

</div>
<div>
</div>
    
</body>
</html>