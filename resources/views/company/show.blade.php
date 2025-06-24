<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>
    /* 案件一覧 */
    .anken_list {
        display: flex;
        column-gap: .5rem;
        border-bottom: 1px solid #ddd;
        width: 70%;
        padding: .4rem .8rem;
    }


    .sittyu_display {
        display: none;
    }

    .active {
        display: block;
    }
    .none {
        display: none;
    }
</style>
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



<div>
    <p>担当者一覧</p>

    <form method="post" action="{{ route('company.register', $company) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name='company_id' value="{{$company->id}}">
    <button type="submit">担当者登録</button>
</form>
@if ($company->people->count())
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



            <!-- 案件一覧 -->

            <p>案件一覧</p>
            @if ($company->items->count())

            <!-- フィルターボタン -->   
            <form class="" method="GET" action="{{route('company.show', $company)}}">
            <select name="pullStatus" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                                @foreach ($statuses as $pullStatus)
                                <option value="{{$pullStatus->id}}">{{ $pullStatus->name }}</option>
                                @endforeach
                        </select>
                        <button class="btnroler" name=”pullStatus”>
                        選択
                    </button>
            </form>

            <!-- 案件ステータスを選択した場合 -->

            @if (isset($_GET['pullStatus']))
            <div class="anken_display">
            @foreach ($selectItems as $item)
             <form class="anken_list" method="post" action="{{route('item.detach', $company)}}">
                    @csrf
                    @method('patch')

                    <p>{{ $item->name }}</p> 
                    <input type="hidden" name="item" value="{{$item->id}}">
                    <input type="hidden" name='company_id' value="{{$company->id}}">
                    <p>{{ $item->pivot->status->name}}</p>                         
                    <button class="btnroler">
                        削除
                    </button>
                </form>
                @endforeach
            </div>

            @else

            <!-- 案件ステータスを選択しない場合 -->
            <div class="anken_display">
            @foreach ($company->items as $item)
             <form class="anken_list" method="post" action="{{route('item.detach', $company)}}">
                    @csrf
                    @method('patch')

                    <!-- 案件名 -->
                    <a href="{{route('item.show', [$item , $company->id , $comment])}}"><p>{{ $item->name }}</p> </a>
                    <input type="hidden" name="item" value="{{$item->id}}">
                    <input type="hidden" name='company_id' value="{{$company->id}}">

                    <!-- ステータス -->
                    <p>{{ $item->pivot->status->name}}</p> 
                    
                    <!-- コメント -->
                    @foreach ($company->comments as $comment)
                    <a href="{{route('comment.show', $comment)}}">
                    @endforeach
                        <p>{{ $item->comments->count()}}</p>
                    </a>

                        
                    <!-- 削除ボタン -->
                    <button class="btnroler">
                        削除
                    </button>
                </form>
                @endforeach
            </div>

            @endif  

             

            
                @else
                @endif  






                  <form method="post" action="{{route('item.attach', $company)}}">
                    @csrf
                    @method('patch')
                    <select name="item_id" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                    @foreach ($items as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>

                      
                        <select name="state_id" id="state_input">
                        @foreach ($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
               

                        <input type="hidden" name='company_id' value="{{$company->id}}">
                    <button class="btnroleb">
                        案件追加
                    </button>
                </form>




<br>
<p>案件の更新</p>


@if ($company->items->count())            
@foreach ($company->items as $item)

<form method="post" action="{{ route('item.update', $company) }}" enctype="multipart/form-data">
@csrf
@method('patch')

<div>
    <label for="item">案件</label>
    <p>{{ $item->name }}</p> 
    <input type="hidden" name="item" value="{{$item->id}}">
</div>
<input type="hidden" name='company_id' value="{{$company->id}}">

<div>

    <label for="note">状況</label>
    <select name="state_id" id="state_input">
                        @foreach ($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
</div>

<button type="submit">更新</button>
</form>

@endforeach


@else
@endif  
                

 
 
          </div>
                </div>
                

</div>
<div>
</div>


<!-- 失注ボタン -->
 <script>
const sittyuBtn = document.getElementById('sittyu_btn');

sittyuBtn.addEventListener('click', function() {
    const sittyuDisplay = document.querySelector('.sittyu_display');
    const ankenDisplay = document.querySelector('.anken_display')
    sittyuDisplay.classList.toggle('active');
    ankenDisplay.classList.toggle('none');
  
      });

 </script>



    
</body>
</html>


