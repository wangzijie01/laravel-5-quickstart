@extends('adminlte::page')

@section('title', '管理后台')


@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">用户信息</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>用户名</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>邮箱</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>注册时间</th>
                    <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
                </tr>
                <tr>
                    <th>上次登录</th>
                    <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
                </tr>

            </table>
        </div>
    </div>
@stop


