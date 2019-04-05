@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8">
        @include('partials.list', ['components' => config('components.' . $model)])
    </div>

    <div class="col-sm-4">
        @includeIf('partials.' . $action, ['components' => config('components.' . $model)])
    </div>
</div>
@stop

@section('optitle')
    <th scope="col" class="all">操作</th>
@stop

@section('operator')
    <td>
        <a href="{{ route($model . '.index', ['edit', $item->id]) }}" class="btn btn-info btn-flat btn-sm" title="编辑">
            <i class="icon fa fa-edit"></i> 编辑
        </a>
        <a href="{{ route('password.reset', $item->id) }}" class="btn btn-warning btn-flat btn-sm" title="重置密码">
            <i class="icon fa fa-key"></i> 重置密码
        </a>
    </td>
@show