<div class="form-group  {{ $errors->has('title') ? 'has-error' : '' }}">
    {{ Form::label('title', '标题', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => '文章标题']) }}
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('thumb', '缩略图', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        <div class="input-group">
            {{ Form::text('thumb', null, ['class' => 'form-control','id'=>'thumb-input','readonly'=>'readonly']) }}
            <span class="input-group-btn">
                 <span class="btn btn-info fileinput-button">
                    <span>选择图片</span>
                    <input id="fileupload" type="file" name="file">
                </span>
            </span>
        </div>

        <div class="input-group">
            <img src="@if(isset($article))  {{ $article->thumb }} @else {{ asset('/images/nopic.jpg') }} @endif"
                 id="thumb-preview" class="img-responsive img-thumbnail">
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::label('content', '内容', ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        <script id="container" name="content" type="text/plain">
            @if(isset($article))
                {!! $article->content !!}
            @endif
        </script>
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

@include('vendor.ueditor.assets')


@push('css')
    <link href="https://cdn.bootcss.com/blueimp-file-upload/9.18.0/css/jquery.fileupload.min.css" rel="stylesheet">
@endpush


@push('js')
    <script src="https://cdn.bootcss.com/blueimp-file-upload/9.18.0/js/vendor/jquery.ui.widget.min.js"></script>
    <script src="https://cdn.bootcss.com/blueimp-file-upload/9.18.0/js/jquery.iframe-transport.min.js"></script>
    <script src="https://cdn.bootcss.com/blueimp-file-upload/9.18.0/js/jquery.fileupload.min.js"></script>
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
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
            autoHeightEnabled: true,
            initialFrameHeight: 500,
            autoFloatEnabled: false,
            toolbars: [
                ['fullscreen', 'source', 'bold', 'italic', 'underline', '|', 'justifyleft', 'justifyright', 'justifycenter', '|', 'removeformat', 'formatmatch', 'forecolor', 'autotypeset', '|', 'simpleupload', 'insertimage']
            ]
        });
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });
    </script>
@endpush