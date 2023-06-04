@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in! Dobrodošli! :)') }}
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-sm-center">
    <div class="btn-group">
        <a href="{{ url('/users') }}" class="btn btn-primary" aria-current="page">Users</a>
        <a href="{{ url('/roles') }}" class="btn btn-primary">Roles</a>
        <a href="{{ url('/pages') }}" class="btn btn-primary">Pages</a>
    </div>
    </div>
</div>
@endsection


