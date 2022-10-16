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
    <input type="text" name="content" class="todo-add-form">
    <select name="tag_id" class="select-tag">
            <option value="1"></option>
            <option value="2">家事</option>
            <option value="3">勉強</option>
            <option value="4">運動</option>
            <option value="5">食事</option>
            <option value="6">移動</option>
          </select>
    <input class="button-add" type="submit" value="検索">
    </div>
    </form>

<div class="todo-content">
  <table class="todo-list-table">
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>タグ</th>
    <th>更新</th>
    <th>削除</th>
  </tr>
  <tr align="center">
</table>
</div>

<a class="btn btn-back" href="/home">戻る</a>