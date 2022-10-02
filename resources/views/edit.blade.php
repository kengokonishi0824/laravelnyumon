<form action="/edit" method="POST">
  <table>
    @csrf
    <tr>
      <th>
        id
      </th>
      <td>
        <input type="text" name="id" value="{{$form->id}}">
      </td>
    </tr>
    <tr>
      <th>
        content
      </th>
      <td>
        <input type="text" name="content" value="{{$form->content}}">
      </td>
    </tr>
      <th></th>
      <td>
        <button>更新</button>
      </td>
    </tr>
  </table>
</form>