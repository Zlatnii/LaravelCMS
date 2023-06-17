<x-header/>
@extends('layouts.app')
@section('content')
<body style="margin-left: 15px;">
@if (auth()->check())
    <div>Welcome, {{ auth()->user()->name }}</div>
@endif
<br>
      <form action="{{ route('pages.index') }}" method="GET" style="display: inline-block;">
        <button type="submit" class="btn btn-secondary" style="display: inline-block;">Pages</button>
      </form>
  <br>
  <div class="container">
      <div class="table table-bordered table-striped text-center">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Page Title</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($navigations as $navs)
          <tr>
            <td>{{ $navs->name }}</td>
            <td>{{ app('App\Http\Controllers\PageController')->getPageName($navs->page) }}</td>
            <td>
              <form action="{{ route('navigations.destroy', $navs->id) }}" method="POST" style="display: inline-block;">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              &nbsp;
              <form action="{{ route('navigations.edit', $navs->id) }}" method="GET" style="display: inline-block;">
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
<x-footer/>
@endsection
