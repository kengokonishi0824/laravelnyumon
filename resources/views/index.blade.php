<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="./../../public/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo_list</title>
</head>

<body class=body>
<form action="/add" method="post">
  <table>
    @csrf
    <tr>
      <th>
        Todo List
      </th>
      <td>
      </td>
      
    </tr>
      <td>
        <input type="text" name="content">
      </td>
      <td>
        <button>追加</button>
      </td>
  </table>
</form>


<table>
  <tr>
    <th>作成日</th>
    <th>
      <table>
        <th>タスク名</th>
        <th>更新</th>
      </table>
    </th>
    <th>削除</th>
  @foreach ($todos as $todo)
  <tr>
    <td>
      {{$todo->created_at}}
    </td>
      
    <td><form action="/edit" method="POST">
      @csrf
      <input type="text" name="content" value="{{$todo->content}}">
      <input type ="hidden" name="id" value="{{$todo->id}}">
      <input type="submit" value="更新">
      </form>
    </td>
    <td><form action="/delete" method="POST">
      @csrf
      <input type ="hidden" name="id" value="{{$todo->id}}">
      <input type="submit" value="削除">
      </form>
    </td>
  </tr>
  @endforeach
</table>



</body>
</html>