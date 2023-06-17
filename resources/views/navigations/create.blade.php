<x-header/>
@extends('layouts.app')
@section('content')
<body style="margin-left: 15px;">
    <h1> Add Navigation Title </h1> <br>
    <form action="{{ route('pages.index') }}" method="GET" style="display: inline-block;">
        <button type="submit" class="btn btn-secondary" style="display: inline-block;">Pages</button>
    </form>
    &nbsp;
    <form action="{{ route('navigations.view') }}" method="GET" style="display: inline-block;">
        <button type="submit" class="btn btn-warning" style="display: inline-block;">View/Edit</button>
    </form>
    <div class="content"><br>
        <div style="width: 450px; margin-left: 10px;"> 
            <form action="{{ route('navigations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp" 
                    placeholder="Enter Name" name="name" value="{{ old('name') }}" required>
                    <small id="NameHelp" class="form-text text-muted">Please enter a name.</small>
                </div>
                <div class="form-group">
                <label for="exampleInputRole">Connect with page:</label>
                <select class="form-control" id="exampleInputPage" name="page" nullable>
                    <option value="">Select Page Title</option>
                    @foreach($pages as $page)
                        <option value="{{ $page->id }}">{{ $page->title }}</option>
                    @endforeach
                </select>
                </div>
                <br>
                <div class="btn btn-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
  
<x-footer/>
@endsection