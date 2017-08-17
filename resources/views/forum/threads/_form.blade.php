@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
<style type="text/css">
    .note-group-select-from-files {
      display: none;
    }
</style>
@endsection

{{ Form::open(['route' => $route, 'method' => $method ?? 'POST']) }}
    <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
        {{ Form::label('subject') }}
        {{ Form::text('subject', isset($thread) ? $thread->subject : null, ['class' => 'form-control', 'required']) }}

        @if($errors->has('subject'))
            <span class="help-block">
                <strong>{{ $errors->first('subject') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
        {{ Form::label('body') }}
        {{ Form::textarea('body', isset($thread) ? $thread->body : null, ['class' => 'form-control', 'required']) }}

        @if($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
        {{ Form::label('tags') }}
        {{ Form::select('tags[]', $tags->pluck('name', 'id'), isset($thread) ? $thread->tags()->pluck('id')->toArray() : [], ['class' => 'form-control', 'id' => 'tags', 'multiple']) }}

        @if($errors->has('tags'))
            <span class="help-block">
                <strong>{{ $errors->first('tags') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        {{ Form::submit(isset($thread) ? 'Update Thread' : 'Create Thread', ['class' => 'btn btn-primary btn-block']) }}        
    </div>
{{ Form::close() }}

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#body').summernote({
            placeholder: 'write here...',
            height: 300,
        });

        $("#tags").select2({
            maximumSelectionLength: 4,
        });
    });
</script>
@endsection