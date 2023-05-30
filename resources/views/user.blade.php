<!DOCTYPE html>
<html>
<head>
  <title>CMS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <h1>Content Managament System</h1> 
  <br>
  <a href="{{ route('users.create')}}"><button type="button" class="btn btn-success">Add User</button></a>  
  <br>
  <div class="container mt-4">
    <table class="table">
      <thead>
        <tr>
          <th>img</th>
          <th>name</th>
          <th>surname</th>
          <th>email</th>
          <th>roles</th>
          <th>last login</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
      <tr>
            <td>
              @if ($user->img_path)
              <img src="{{ Storage::url($user->img_path) }}" alt="User Image" width="50" height="50">
              @else
                  <p>No image available</p>
              @endif
              </td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->surname }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->roles }}</td>
              <td>{{ $user->updated_at->diffForHumans() }}</td>
              <td>
              <form action="{{ route('destroy', $user->id) }}" method="POST">
                  @csrf 
                  @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form> 
              </td>
              <td>  
                <form action="{{ route('edit', $user->id) }}" method="GET">
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
              </td>
          </tr>
      </tr>
        @endforeach
      </tbody>
    </table>
  </div><br>
  <footer>Algebra 2023 - Ivo Zlatunić</footer>
</body>
</html>
