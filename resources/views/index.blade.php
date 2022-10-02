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
    <th>タスク名</th>
    <th>更新</th>
    <th>削除</th>
  @foreach ($todos as $todo)
  <tr>
    <td>
      {{$todo->created_at}}
    </td>
    <td>
      <input type="text" name="content" value="{{$todo->content}}">
    </td>
    <td><form action="/edit" method="POST">
      @csrf
      <button>更新</button>
    </td>
    <td><form action="/delete" method="POST">
      @csrf
      <button>削除</button>
    </td>
  </tr>
  @endforeach
</table>