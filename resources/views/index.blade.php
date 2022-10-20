<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo_list</title>
</head>

<body class="body">
  <div class="card">
    <div class="card-header">
      <p class="title">
        Todo List
      </p>
      @if (Auth::check())
      <p class="user-name">「{{$user->name}}」でログイン中</p>
      @else
      <p class="user-name">ログインしてください（<a href="/login">ログイン</a>
      <a href="/register">登録</a></p>
      @endif
      <form method="post" action="/logout">
      <input type="hidden" name="_token" value="4E82GJiYu1NT8Y88TQsCnZwcvoHwDiROAASTJsU3">      
      <input class="btn btn-logout" type="submit" value="ログアウト">
      </form>
    </div>

    <a class="btn btn-search" href="/search">タスク検索</a>
    <div class="todo-add">
        @csrf
      @if ($errors->has('content'))
        <tr>
          <th>ERROR</th>
          <td>
            {{$errors->first('content')}}
          </td>
        </tr>
        @endif
    <form action="/add" method="post">
    <input type="text" name="content" class="todo-add-form">
    <select name="tag_id" class="select-tag">
      @foreach($tags as $tag)
      @if(old('tag_id',$todo->tag_id) == $tag->id)
      <option value="{{ $tag->id }}" selected>{{ $tag->category }}</option>
      @else
      <option value="{{ $tag->id }}">{{ $tag->category }}</option>
      @endif
      @endforeach


    <input class="button-add" type="submit" value="追加">
    </form>
    </div>





<div class="todo-content">
  <table class="todo-list-table">
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>タグ</th>
    <th>更新</th>
    <th>削除</th>
  @foreach ($todos as $todo)
  </tr>
  <tr align="center">
    <td>
      {{$todo->created_at}}
    </td>
      
    <td><form action="/edit" method="POST">
        <input type="text" name="content" value="{{$todo->content}}" class="text-update">
    </td>
      @csrf
    <td>
      <select name="tag_id" class="select-tag">
        <option selected="" value="1">家事</option>
        <option value="2">勉強</option>
        <option value="3">運動</option>
        <option value="4">食事</option>
        <option value="5">移動</option>
        </select>
    </td>
    <td>
        <input type ="hidden" name="id" value="{{$todo->id}}">
        <input type="submit" value="更新" class="button-update">
    </td>
      </form>
    <td><form action="/delete" method="POST">
      @csrf
      <input type ="hidden" name="id" value="{{$todo->id}}">
      <input type="submit" value="削除" class="button-delete">
      </form>
    </td>
  </tr>
  @endforeach
  </table>
</div>
</div>
</body>
</html>