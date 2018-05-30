@extends('adminlte::page')

@section('title', '管理后台')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">编辑店招</h3>
        </div>
        <div class="box-body">
            {{ Form::model($banner, ['route' => ['admin.banner.update', $banner], 'class' => 'form-horizontal',  'method' => 'PATCH']) }}
                @include('admin.banner._form')
            {{ Form::close() }}
        </div>
    </div>
@stop


