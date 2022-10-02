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