<!DOCTYPE html>
<html>
<head>
  <title>Hardcoded Table with Bootstrap</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <h1>Content Managament System</h1> <br>
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
          <td><img src="{{ $user->img }}" alt="Profile Image" class="img-thumbnail"></td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->surname }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->roles }}</td>
          <td>{{ $user->created_at->diffForHumans() }}</td>
          <td>
            <form action="{{ route('destroy', $user->id) }}" method="POST">
            <button type="button" class="btn btn-success">Edit</button>
                @csrf 
                @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form> 
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div><br>
  <footer>Algebra 2023 - Ivo Zlatunić</footer>
</body>
</html>
