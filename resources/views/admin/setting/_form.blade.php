<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="@if($tab == 1)active @endif"><a href="{{ route('admin.setting.index',['tab' => 1]) }}">小程序配置</a></li>
        <li class="@if($tab == 2)active @endif"><a href="{{ route('admin.setting.index',['tab' => 2]) }}">公众号配置</a></li>
        <li class="@if($tab == 3)active @endif"><a href="{{ route('admin.setting.index',['tab' => 3]) }}">微信支付</a></li>
        <li class="@if($tab == 4)active @endif"><a href="{{ route('admin.setting.index',['tab' => 4]) }}">其他配置</a></li>
    </ul>
    <div class="tab-content">
        @if($tab == 1)
            @include('admin.setting.tabs.mini_program')
        @elseif($tab == 2)
            @include('admin.setting.tabs.wechat')
        @elseif($tab == 3)
            @include('admin.setting.tabs.payment')
        @elseif($tab == 4)
            @include('admin.setting.tabs.other')
        @endif
    </div>
    <!-- /.tab-content -->
</div>
<div class="form-group">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
        <div class="pull-right">
            {{ Form::submit("提交", ['class' => 'btn btn-success btn-flat']) }}
        </div>
    </div>
</div>
