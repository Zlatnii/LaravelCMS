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
        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline-block;">
            @csrf 
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form> 
        &nbsp;
        <form action="{{ route('pages.edit', $page->id) }}" method="GET" style="display: inline-block;">
            <button type="submit" class="btn btn-success">Edit</button>
        </form>
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
    