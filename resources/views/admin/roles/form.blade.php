<p>
    {{ Form::label('role', 'Role name', ['class' => 'control-label']) }}
    {{ Form::text('role',
         old('role') ? old('role') : (!empty($role) ? $role->role : null),
         [
            'class' => 'form-group user-email',
            'placeholder' => 'Role name',
         ])
    }}
</p>
<p>
    {{ Form::label('homepage', 'Homepage', ['class' => 'control-label']) }}
    {{ Form::text('homepage',
         old('homepage') ? old('homepage') : (!empty($role) ? $role->homepage : null),
         [
            'class' => 'form-group user-email',
            'placeholder' => '/somepage*',
         ])
    }}
</p>
<p>
    {{ Form::submit('Submit Form', ['class' => 'btn btn-success'])}}
</p>
