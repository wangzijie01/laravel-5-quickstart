@extends('adminlte::page')

@section('title', '管理后台')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">编辑用户</h3>
        </div>
        <div class="box-body">
            {{ Form::model($user, ['route' => ['admin.user.update', $user], 'class' => 'form-horizontal',  'method' => 'PATCH']) }}
                @include('admin.user._form')
            {{ Form::close() }}
        </div>
    </div>
@stop


