<div class="row">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('appid', 'AppID', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                {{ Form::text('wechat[appid]', isset(json_decode($setting->wechat)->appid) ? json_decode($setting->wechat)->appid: '', ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('app_secret', 'AppSecret', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                {{ Form::text('wechat[app_secret]', isset(json_decode($setting->wechat)->app_secret) ? json_decode($setting->wechat)->app_secret: '', ['class' => 'form-control']) }}
            </div>
        </div>
    </div>

</div>
