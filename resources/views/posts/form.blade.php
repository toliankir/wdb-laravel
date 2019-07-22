@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<p>
    {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
    {{ Form::text('title',
         old('title') ? old('title') : (!empty($post) ? $post->title : ''),
         [
            'class' => 'form-group user-email',
            'placeholder' => 'Post title',
         ])
    }}
</p>
<p>
    {{Form::textarea("body", old("body") ? old("body") : (!empty($post) ? $post->body : ''),
         [
            "class" => "form-group",
         ])
    }}
</p>
<p>
    {{ Form::submit('Submit Form', ['class' => 'btn btn-info'])}}
</p>
