@extends('adminlte::page')

@section('title', '管理后台')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">编辑文章</h3>
        </div>
        <div class="box-body">
            {{ Form::model($article, ['route' => ['admin.article.update', $article], 'class' => 'form-horizontal',  'method' => 'PATCH']) }}
                @include('admin.article._form')
            {{ Form::close() }}
        </div>
    </div>
@stop


