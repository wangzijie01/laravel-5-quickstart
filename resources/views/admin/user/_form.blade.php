<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('name', '账号', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        @if(isset($user))
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => '账号','disabled'=>'disabled']) }}
        @else
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => '账号']) }}
        @endif
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {{ Form::label('email', '邮箱', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        @if(isset($user))
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => '登录邮箱','disabled'=>'disabled']) }}
        @else
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => '登录邮箱']) }}
        @endif
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    {{ Form::label('password', '密码', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => '密码']) }}
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    {{ Form::label('password_confirmation', '确认密码', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => '确认密码']) }}
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('is_administrator', '管理员', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-1">
        @if(isset($user) && $user->hasRole('administrator'))
            {{ Form::checkbox('is_administrator', '1',true) }}
        @else
            {{ Form::checkbox('is_administrator', '1') }}
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
        <div class="pull-right">
            {{ Form::submit("提交", ['class' => 'btn btn-success btn-flat']) }}
        </div>
    </div>
</div>
