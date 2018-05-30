<div class="row">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('appid', 'AppID', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                {{ Form::text('mini_program[appid]', isset(json_decode($setting->mini_program)->appid) ? json_decode($setting->mini_program)->appid: '', ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('app_secret', 'AppSecret', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                {{ Form::text('mini_program[app_secret]', isset(json_decode($setting->mini_program)->app_secret) ? json_decode($setting->mini_program)->app_secret: '', ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('url', '服务器地址', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                {{ Form::text('mini_program[url]', isset(json_decode($setting->mini_program)->url) ? json_decode($setting->mini_program)->url: '', ['class' => 'form-control','placeholder' => '选填']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('token', 'Token', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                {{ Form::text('mini_program[token]', isset(json_decode($setting->mini_program)->token) ? json_decode($setting->mini_program)->token: '', ['class' => 'form-control','placeholder' => '选填']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('aes_key', 'EncodingAESKey', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                {{ Form::text('mini_program[aes_key]', isset(json_decode($setting->mini_program)->aes_key) ? json_decode($setting->mini_program)->aes_key: '', ['class' => 'form-control','placeholder' => '选填']) }}
            </div>
        </div>
    </div>

</div>
