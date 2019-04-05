@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        @include('partials.list', ['components' => config('components.' . $model)])
    </div>
</div>
@stop
