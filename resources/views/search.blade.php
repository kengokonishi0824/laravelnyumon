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
      <p class="title">タスク検索</p>
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
      <form action="" method="post">
      @csrf
      @if ($errors->has('content'))
        <tr>
          <th>ERROR</th>
          <td>
            {{$errors->first('content')}}
          </td>
        </tr>
        @endif
<div class="todo-add">
  <form action="find" method="POST">
  @csrf
  <input type="text" name="input" value="{{$input}}" class="todo-add-form">
  <select name="tag_id" class="select-tag">
            <option value=""></option>
      @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->category}}</option>
      @endforeach
    </select>
  <input type="submit" value="検索" class= "button-add">
    </form>
</div>

<div class="todo-content">
  @if (@isset($todo))
  <table class="todo-list-table">
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>タグ</th>
    <th>更新</th>
    <th>削除</th>
  </tr>
  <tr align="center">
@endif
</table>
</div>

<a class="btn btn-back" href="/home">戻る</a>