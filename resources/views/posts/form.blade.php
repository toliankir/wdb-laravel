<p>
    {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
    {{ Form::text('title',
         old('title') ? old('title') : (!empty($post) ? $post->title : ''),
         [
            'class' => 'form-group user-email',
            'placeholder' => 'Post title',
         ])
    }}
</p><p>
    {{Form::textarea("body", old("body") ? old("body") : (!empty($post) ? $post->body : ''),
         [
            "class" => "form-group",
         ])
    }}
</p>
<p>
    {{ Form::submit('Submit Form', ['class' => 'btn btn-info'])}}
</p>
