@extends('layouts.app')
@section('content')
<div class="container">
        @if (!auth()->check())
            @guest
                <script>window.location.href = "{{ route('login') }}";</script>
            @endguest
        @endif
        @if($page)
        <h1>{{ $page->title }}</h1>
        <br>
        <div class="img">
        @if ($page->img_path)
            <img src="{{ Storage::url($page->img_path) }}" alt="Image" width="100" height="100">
        @else
            <p>No image available</p>
        @endif
        </div> 
        <br>
        <h4>{{ $page->subtitle }}</h4><br>
        <p>{{ $page->content }}</p><br>
        <div class="slug">Slug:<p>{{ $page->slug }}</p></div>
        @if (Auth::user()->can('update', $page) || Auth::user()->role == 1)

                <!-- User can edit their own page -->
                <form action="{{ route('pages.edit', $page->id) }}" method="GET" style="display: inline-block;">
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            @endif
            
            @if (Auth::user()->can('delete', $page) || Auth::user()->role == 1)
                <!-- User can delete their own page -->
                <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
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
        <br>
        <br>
        @if ($page->user)
            <p>Creator: {{ $page->user->name }}</p>
        @else
            <p>Creator not found</p>
        @endif
        @endif
        <br>
        <footer class="blockquote-footer">Algebra 2023 - Ivo Zlatunić</footer>
       
    </div>
@endsection
    