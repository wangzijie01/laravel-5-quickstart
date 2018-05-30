<div class="form-group">
    {{ Form::label('app_id', 'AppID', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::text('payment[app_id]', isset(json_decode($setting->payment)->app_id) ? json_decode($setting->payment)->app_id : '', ['class' => 'form-control', 'placeholder' => '微信支付AppID']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('mch_id', '商户号', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::text('payment[mch_id]', isset(json_decode($setting->payment)->mch_id) ? json_decode($setting->payment)->mch_id : '', ['class' => 'form-control', 'placeholder' => '微信支付商户号']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('key', 'API密钥', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::text('payment[key]', isset(json_decode($setting->payment)->key) ? json_decode($setting->payment)->key : '', ['class' => 'form-control', 'placeholder' => '微信支付秘钥']) }}
    </div>
</div>


<div class="form-group">
    {{ Form::label('apiclient_cert', '支付证书', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        <div class="input-group">
            {{ Form::text('payment[cert_path]', isset(json_decode($setting->payment)->cert_path) && file_exists(json_decode($setting->payment)->cert_path) ? "证书apiclient_cert.pem已上传" : '', ['class' => 'form-control','id'=>'thumb-input','readonly'=>'readonly','placeholder'=>'商户号后台下载证书，并上传apiclient_cert.pem']) }}
            <span class="input-group-btn">
                 <span class="btn btn-info fileinput-button">
                    <span>上传证书</span>
                    <input id="fileupload1" type="file" name="file">
                </span>
            </span>
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('apiclient_key', '证书秘钥', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        <div class="input-group">
            {{ Form::text('payment[key_path]', isset(json_decode($setting->payment)->key_path) && file_exists(json_decode($setting->payment)->key_path) ? '证书apiclient_key.pem已上传' : '', ['class' => 'form-control','id'=>'thumb-input','readonly'=>'readonly','placeholder'=>'商户号后台下载证书，并上传apiclient_key.pem']) }}
            <span class="input-group-btn">
                 <span class="btn btn-info fileinput-button">
                    <span>上传证书</span>
                    <input id="fileupload2" type="file" name="file">
                </span>
            </span>
        </div>
    </div>
</div>

@push('css')
    <link href="https://cdn.bootcss.com/blueimp-file-upload/9.21.0/css/jquery.fileupload.min.css" rel="stylesheet">
@endpush

@push('js')
    <script src="https://cdn.bootcss.com/blueimp-file-upload/9.21.0/js/vendor/jquery.ui.widget.min.js"></script>
    <script src="https://cdn.bootcss.com/blueimp-file-upload/9.21.0/js/jquery.iframe-transport.js"></script>
    <script src="https://cdn.bootcss.com/blueimp-file-upload/9.21.0/js/jquery.fileupload.min.js"></script>
    <script>
        $(function () {
            'use strict';

            // Change this to the location of your server-side upload handler:

            $('#fileupload1').fileupload({
                url: "/admin/upload?type=2",
                dataType: 'json',
                type: 'POST',
                done: function (e, data) {
                    console.log(data);
                    if (data.result.code > 5000) {
                        alert(data.result.message);
                        return;
                    }

                    $('#thumb-preview').attr('src', data.result.url);
                    $('#thumb-input').val(data.result.url);

                }
            });
            $('#fileupload2').fileupload({
                url: "/admin/upload?type=2",
                dataType: 'json',
                type: 'POST',
                done: function (e, data) {
                    if (data.result.code > 5000) {
                        alert(data.result.message);
                    }
                    $('#thumb-preview').attr('src', data.result.url);
                    $('#thumb-input').val(data.result.url);
                }
            });
        });
    </script>
@endpush