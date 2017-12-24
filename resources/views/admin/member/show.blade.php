@extends('adminlte::page')

@section('title', '管理后台')


@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">会员信息</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>会员</th>
                    <td>{!! $member->member_avatar !!}</td>
                </tr>
                <tr>
                    <th>邀请人</th>
                    <td>{!! $member->inviter_avatar !!}</td>
                </tr>
                <tr>
                    <th>公众号</th>
                    <td>{!! $member->subscribe_label !!}</td>
                </tr>
                <tr>
                    <th>unionid</th>
                    <td>{{ $member->unionid }}</td>
                </tr>
                <tr>
                    <th>openid</th>
                    <td>{{ $member->openid }}</td>
                </tr>

                <tr>
                    <th>注册时间</th>
                    <td>{{ $member->created_at }} ({{ $member->created_at->diffForHumans() }})</td>
                </tr>
                <tr>
                    <th>上次登录</th>
                    <td>{{ $member->updated_at }} ({{ $member->updated_at->diffForHumans() }})</td>
                </tr>

            </table>
        </div>
    </div>
@stop


