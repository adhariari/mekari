@extends('layout/main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-10">
            <div class="jumbotron">
                <h1 class="display-4">Hello,</h1>
                <p class="lead">This is a simple to do list app for Mekari assessment quiz about PHP.</p>
                <hr class="my-4">
                <p>It used PHP Laravel 5.2 Frameworks, MySQL and AJAX.
                </p>
                <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ url('/todolists') }}" role="button">To Do List</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection