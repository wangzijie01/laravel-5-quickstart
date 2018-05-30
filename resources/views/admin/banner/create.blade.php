@extends('adminlte::page')

@section('title', '管理后台')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">创建店招</h3>
        </div>
        <div class="box-body">
            {{ Form::open(['route' => 'admin.banner.store', 'class' => 'form-horizontal', 'method' => 'post']) }}
                @include('admin.banner._form')
            {{ Form::close() }}
        </div>
    </div>
@stop


