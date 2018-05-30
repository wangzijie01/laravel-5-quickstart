<div class="form-group  {{ $errors->has('sort') ? 'has-error' : '' }}">
    {{ Form::label('sort', '排序', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::text('sort', 100, ['class' => 'form-control', 'placeholder' => '序号越大越靠前']) }}
        @if ($errors->has('sort'))
            <span class="help-block">
                <strong>{{ $errors->first('sort') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('thumb', '缩略图', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        <div class="input-group">
            {{ Form::text('image', null, ['class' => 'form-control','id'=>'thumb-input','readonly'=>'readonly']) }}
            <span class="input-group-btn">
                 <span class="btn btn-info fileinput-button">
                    <span>选择图片</span>
                    <input id="fileupload" type="file" name="file">
                </span>
            </span>
        </div>

        <div class="input-group">
            <img src="@if(isset($banner))  {{ $banner->image }} @else {{ asset('/images/nopic.jpg') }} @endif"
                 id="thumb-preview" class="img-responsive img-thumbnail">
        </div>
    </div>
</div>

<div class="form-group  {{ $errors->has('sort') ? 'has-error' : '' }}">
    {{ Form::label('status', '是否显示', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::radio('status', '1',true) }} 显示
        {{ Form::radio('status', '0') }} 不显示
        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
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

            $('#fileupload').fileupload({
                url: "/admin/upload",
                dataType: 'json',
                type: 'POST',
                done: function (e, data) {
                    if (data.result.code > 5000) {
                        alert(data.result.message);
                        return;
                    }
                    $('#thumb-preview').attr('src', data.result.url);
                    $('#thumb-input').val(data.result.url);
                }
            });
        });

    </script>
@endpush