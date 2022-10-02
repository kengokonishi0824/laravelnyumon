
<table>
  <tr>
    <th>id</th>
    <th>content</th>
  @foreach ($todos as $todo)
  <tr>
    <td>
      {{$todo->id}}
    </td>
    <td>
      {{$todo->content}}
    </td>
  </tr>
  @endforeach
</table>