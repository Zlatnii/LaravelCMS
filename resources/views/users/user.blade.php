<!DOCTYPE html>
<html>
<head>
  <title>CMS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
@extends('layouts.app')
@section('content')
<body style="margin-left: 15px;">
  <br>
    <h1 style="display: inline-block;">Users
      <form action="{{ route('users.create') }}" method="GET" style="display: inline-block;">
        <button type="submit" class="btn btn-success" style="display: inline-block;">Add User</button>
      </form>
    </h1>
<br>
  @if (auth()->check())
    <div>Welcome, {{ auth()->user()->name }}</div>
  @endif
<br>
  <div class="container mt-4">
    <table class="table table-bordered table-striped text-center">
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
              <td>{{ app('App\Http\Controllers\RoleController')->getRoleName($user->role) }}</td>
              <td>{{ \Carbon\Carbon::parse($user->last_login)->diffForHumans() }}</td>
              <td>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                  @csrf 
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form> 
                &nbsp;
                <form action="{{ route('users.edit', $user->id) }}" method="GET" style="display: inline-block;">
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
  @endsection
</body>
</html>
