<!DOCTYPE html>
<html>
<head>
  <title>Roles</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
@extends('layouts.app')
@section('content')
<body style="margin-left: 15px;">
  <br>
    <h1 style="display: inline-block;">Roles
      <form action="{{ route('roles.create') }}" method="GET" style="display: inline-block;">
        <button type="submit" class="btn btn-success" style="display: inline-block;">Add Role</button>
      </form>
    </h1>
<br>
  @if (auth()->check())
    <div>Welcome, {{ auth()->user()->name }}</div>
  @endif
<br>
  <div class="container">
    <div class="table table-bordered table-striped text-center">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Slug</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roles as $role)
        <tr>
          <td>{{ $role->name }}</td>
          <td>{{ $role->slug }}</td>             
          <td>
            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
              @csrf 
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            &nbsp;
            <form action="{{ route('roles.edit', $role->id) }}" method="GET" style="display: inline-block;">
              <button type="submit" class="btn btn-success">Edit</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>
<footer>Algebra 2023 - Ivo Zlatunić</footer>
  @endsection
</html>
