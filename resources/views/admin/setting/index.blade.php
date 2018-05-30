@extends('adminlte::page')

@section('title', '管理后台')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">系统设置</h3>
        </div>
        <div class="box-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif


            {{ Form::model($setting, ['route' => ['admin.setting.update', $setting], 'class' => 'form-horizontal',  'method' => 'PATCH']) }}
            @include('admin.setting._form')
            @if(isset($tab))
                <input type="hidden" name="tab" value="{{ $tab }}" >
            @else
                <input type="hidden" name="tab" value="1" >
            @endif
            {{ Form::close() }}
        </div>
    </div>
@stop


