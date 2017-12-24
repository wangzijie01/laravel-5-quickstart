@extends('adminlte::page')

@section('title', '管理后台')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">编辑会员</h3>
        </div>
        <div class="box-body">
            {{ Form::model($member, ['route' => ['admin.member.update', $member], 'class' => 'form-horizontal',  'method' => 'PATCH']) }}
                @include('admin.member._form')
            {{ Form::close() }}
        </div>
    </div>
@stop


