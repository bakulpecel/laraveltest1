@section('title', 'Forum -')

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Forum</h1>
    <hr>

    <div class="row">
        <div class="col-lg-3">
            {{ Form::open(['route' => 'thread.index', 'method' => 'GET']) }}
                <div class="form-group">
                    {{ Form::text('search', $search ?? null, ['class' => 'form-control', 'placeholder' => 'Search for threads...']) }}
                </div>
            {{ Form::close() }}

            <a class="btn btn-primary btn-block" href="{{ route('thread.create') }}">Create Thread</a>

            <h3>Tags</h3>

            <div class="list-group">
                <a href="#" class="list-group-item active">
                    All
                </a>

                @foreach(App\Tag::orderBy('name')->get() as $tag)
                <a href="#" class="list-group-item">{{ ucfirst($tag->name) }}</a>
                @endforeach
            </div>
        </div>
        
        <div class="col-lg-9">
            @if(count($threads))
                @foreach($threads as $thread)
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left panel-title">
                            <img class="img-circle" height="25" src="https://www.gravatar.com/avatar/205e460b479e2b48aec07710c08d50">

                            <a href="#">{{ $thread->user->username }}</a> <span class="text-info">{{ $thread->created_at->diffForHumans() }}</span>
                        </div>

                        <div class="pull-right panel-title">
                            @foreach($thread->tags as $tag)
                            <a href=""><span class="label label-primary">{{ $tag->name }}</span></a>
                            @endforeach
                        </div>
                    </div>

                    <div class="panel-body">
                        <a href="{{ route('thread.show', ['thread' => $thread->slug]) }}">
                            <span class="badge pull-right">10</span>
                            <h4 class="media-heading">{{ $thread->subject }}</h4>
                            {!! str_limit($thread->body, 120) !!}
                        </a>
                    </div>
                </div>
                @endforeach

                <div class="text-center">
                    {{ $threads->render() }}                    
                </div>
            @else
                <div class="alert alert-info text-center">
                    No threads were found!
                    <a href="#" class="alert-link">Create a new one.</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection