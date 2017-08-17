@section('title', 'Create your thread -')

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create your thread</h1>
    <hr>

    <div class="alert alert-info">
        <p>
            Please try to search for your question first using
            <a href="#" class="alert-link">the search box</a> and make sure you've read our
            <a href="#" class="alert-link">Forum Rules</a> before creating a thread.
        </p>
    </div>

    @include('forum.threads._form', ['route' => 'thread.store'])
</div>
@endsection