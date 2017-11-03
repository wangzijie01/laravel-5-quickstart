@extends('adminlte::page')

@section('title', '管理后台')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">用户管理</h3>
            <div class="box-tools pull-right">
                <div class="pull-right mb-10 hidden-sm hidden-xs">
                    {{ link_to_route('admin.user.index', "所有用户", [], ['class' => 'btn btn-primary btn-xs']) }}
                    {{ link_to_route('admin.user.create', "创建用户", [], ['class' => 'btn btn-success btn-xs']) }}
                </div>
            </div>
        </div>
        <div class="box-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@stop

@push('js')
{!! $dataTable->scripts() !!}
@endpush