@extends('layouts.default')

@section('title', '登录')

@section('body-class', 'login-page')

@section('page')
<!-- Login box -->
<div class="login-box">
    <!-- Login logo -->
    <div class="login-logo">
        <a href="{{ url('/') }}">{{ config('setting.name') }}</a>
    </div>

    <!-- Login card -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">登录{{ $title ?? '' }}</p>

            @include('shared.alert')
            
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" id="username" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="用户名" required>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    @if ($errors->has('username'))
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="密码" required>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" value="1" name="remember_me"> 记住我
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('vendor/iCheck/square/blue.css') }}">
<style>
    .login-logo {
        font-size: 28px;
    }
</style>
@endpush

@push('scripts')
<!-- iCheck -->
<script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
<script>
$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass   : 'iradio_square-blue',
        increaseArea : '20%' // optional
    })
})
</script>
@endpush
