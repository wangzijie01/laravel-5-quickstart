<div class="form-group {{ $errors->has('nickname') ? 'has-error' : '' }}">
    {{ Form::label('nickname', '昵称', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::text('nickname', null, ['class' => 'form-control', 'placeholder' => '微信昵称']) }}
        @if ($errors->has('nickname'))
            <span class="help-block">
                <strong>{{ $errors->first('nickname') }}</strong>
            </span>
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
