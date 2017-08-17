@section('title', $thread->subject . ' -')

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            
        </div>

        <div class="col-lg-9">
            <h1>{{ $thread->subject }}</h1>
            <hr>

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
                    {!! $thread->body !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection