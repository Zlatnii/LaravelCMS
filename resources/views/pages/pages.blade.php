<x-header />

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
        <h1><a class="nav-link" href="{{ route('pages.show', $page->id) }}">{{ $page->title }}</a></h1>
        <br>
        <div class="img">
          @if ($page->img_path)
          <img src="{{ Storage::url($page->img_path) }}" alt="Image" width="80" height="80">
          @else
          <p>No image available</p>
          @endif
        </div>
        <br>
        <h4>{{ $page->subtitle }}</h4>
        <div class="content">
          <p>{{ $page->content }}</p>
        </div>
        <div class="author">
          <p>Created by: {{ app('App\Http\Controllers\PageController')->getUsername($page->user_id) }}</p>
        </div>
        <div class="slug">Slug: <a href="http://{{ $page->slug }}">{{ $page->slug }}</a></div>
        <div>
            @can('update', $page)
                <!-- User can edit their own page -->
                <form action="{{ route('pages.edit', $page->id) }}" method="GET" style="display: inline-block;">
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            @endcan
            
            @can('delete', $page)
                <!-- User can delete their own page -->
                <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endcan
            @can('updateAny', $page)
                <!-- Admin can edit any page -->
                <form action="{{ route('pages.edit', $page->id) }}" method="GET" style="display: inline-block;">
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            @endcan 
            @can('deleteAny', $page)
                <!-- Admin can delete any page -->
                <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endcan
        </div>
        <br>
        <hr><br>
        @endforeach
      </div>
    </div>
  </div>
  <br>
  <x-footer />
  @endsection