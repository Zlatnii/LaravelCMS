<!DOCTYPE html>
<html>
<head>
  <title>CMS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="margin-left: 15px;">
  @extends('layouts.app')
  @section('content')
    <h1 style="display: inline-block;">Pages
      <form action="{{ route('pages.create') }}" method="GET" style="display: inline-block;">
        <button type="submit" class="btn btn-success" style="display: inline-block;">Add Page</button>
      </form>
    </h1>
    <br>
    @if (auth()->check())
      <div>Welcome, {{ auth()->user()->name }}</div>
    @endif
    <br>
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-3">
          <!-- Sidebar -->
          <ul class="nav flex-column">
            @foreach ($pages as $page)
              <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.show', $page->id) }}">{{ $page->title }}</a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="col-md-8 col-md-offset-4">
          @foreach($pages as $page)
            <h1>{{ $page->title }}</h1>
            <br>
            <div class="img">
              @if ($page->img_path)
                <img src="{{ Storage::url($page->img_path) }}" alt="Image" width="50" height="50">
              @else
                <p>No image available</p>
              @endif
            </div>
            <br>
            <h4>{{ $page->subtitle }}</h4>
            <div class="content"><p>{{ $page->content }}</p></div>
            <div class="author"><p>Created by: <a href="">{{ app('App\Http\Controllers\PageController')->getUsername($page->user_id) }}</a></p></div>
            <div class="slug"><p>Slug: <a href="">{{ $page->slug }}</a></p></div>

            <div>
              <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline-block;">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form> 
              &nbsp;
              <form action="{{ route('pages.edit', $page->id) }}" method="GET" style="display: inline-block;">
                <button type="submit" class="btn btn-success">Edit</button>
              </form>
            </div>
            <br><hr><br>
          @endforeach
        </div>
      </div>
    </div>
    <br>
    <footer>Algebra 2023 - Ivo Zlatunić</footer>
  @endsection
</body>
</html>
