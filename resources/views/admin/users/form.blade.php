<p>
    {{ Form::label('name', 'Username', ['class' => 'control-label']) }}
    {{ Form::text('name',
         old('name') ? old('name') : (!empty($user) ? $user->name : null),
         [
            'class' => 'form-group user-email',
            'placeholder' => 'Username',
         ])
    }}
</p>
<p>
    {{ Form::label('email', 'E-Mail', ['class' => 'control-label']) }}
    {{ Form::text('email',
         old('email') ? old('email') : (!empty($user) ? $user->email : null),
         [
            'class' => 'form-group user-email',
            'placeholder' => 'User email',
         ])
    }}
</p>
<p>
    {{ Form::label('type', 'User type', ['class' => 'control-label']) }}
    {{ Form::select('type', $roles, !empty($user) & $user->type ? $roles->search($user->roleIs()): '',
                 [
                    'class' => 'form-group',
                    'placeholder' => 'User type'
                 ])
    }}
</p>
<p>
    {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
    {{ Form::text('password', '',
         [
            'class' => 'form-group user-email',
            'placeholder' => 'Password',
         ])
    }}
</p>
<p>
    {{ Form::label('active', 'Active', ['class' => 'control-label']) }}
    {{ Form::checkbox('active', null, !empty($user) ? $user->active : false,
                 [
                    "class" => "form-group"
                 ])
    }}
</p>
<p>
    {{ Form::submit('Submit Form')}}
</p>
