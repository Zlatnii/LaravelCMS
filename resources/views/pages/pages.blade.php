<x-header />

<body>
  @extends('layouts.app')
  @section('content')
  <div class="container">
    <div class="row">
      <!-- Left Sidebar/Navigations sidebar -->
      <div class="col-md-2">
        <ul class="nav flex-column">
          @php
          $canUpdateAny = Auth::user()->role == 1;
          @endphp
          @if ($canUpdateAny)
          <form action="{{ route('navigations.create') }}" method="GET">
            <button type="submit" class="btn btn-primary">Add Navigation</button>
          </form>
          <br>
          @endif
          @if ($canUpdateAny)
          <!-- Admin can edit any page -->
          <form action="{{ route('navigations.view') }}" method="GET">
            <button type="submit" class="btn btn-secondary">View/Edit</button>
          </form>
          @endif
          <br>
          @foreach($navigations as $navs)
          <li class="nav-item">
            @if($navs->page)
            @php
            $page = $pages->firstWhere('id', $navs->page);
            @endphp
            @if($page)
            <a href="{{ route('pages.show', $page->id) }}" class="text-decoration-none">
              <h5><strong>{{ $navs->name }}</strong></h5>
            </a>
            @endif
            @endif
          </li>
          @endforeach
        </ul>
      </div>
      <!-- Content Section -->
      <div class="col-md-8 offset-md-2">
        <h1 style="display: inline-block;">Pages
          <form action="{{ route('pages.create') }}" method="GET" style="display: inline-block;">
            <button type="submit" class="btn btn-success" style="display: inline-block;">Add Page</button>
          </form>
        </h1>
        <br><br><br>

        @if (auth()->check())
        <div>Welcome, {{ auth()->user()->name }}</div>
        @endif

        <br>

        <!-- Pages Content -->
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
          <p>Created by: <a href="{{route('users.show', $page->user_id) }}">{{ app('App\Http\Controllers\PageController')->getUsername($page->user_id) }}</a></p>
        </div>
        <div class="slug">Slug: <a href="http://{{ $page->slug }}">{{ $page->slug }}</a></div>
        <div>
          <br>
          @if (Auth::user()->can('update', $page) || Auth::user()->role == 1)
          <!-- User can edit their own page -->
          <form action="{{ route('pages.edit', $page->id) }}" method="GET" style="display: inline-block;">
            <button type="submit" class="btn btn-success">Edit</button>
          </form>
          @endif
          &nbsp;
          @if (Auth::user()->can('delete', $page) || Auth::user()->role == 1)
          <!-- User can delete their own page -->
          <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          @endif
          &nbsp;
          @can('updateAny', $page)
          <!-- Admin can edit any page -->
          <form action="{{ route('pages.edit', $page->id) }}" method="GET" style="display: inline-block;">
            <button type="submit" class="btn btn-success">Edit</button>
          </form>
          @endcan
          &nbsp;
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