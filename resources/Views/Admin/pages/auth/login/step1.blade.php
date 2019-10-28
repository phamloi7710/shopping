{{--{{dd(Config::get(['auth']))}}--}}
@extends('woo-commerce::admin.pages.auth.master')
@section('content')
    <div class="login-box">
        <!-- <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div> -->
        <div class="card">
            <div class="card-body login-card-body">
    <p class="login-box-msg">@lang('woo-commerce::login.sign_in_to_start_your_session')</p>
    <form action="{{route('postCheckUsername')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input name="txtUsername" type="text" class="form-control" placeholder="@lang('woo-commerce::login.placeholder.username')">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <p class="mb-1">
            <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('woo-commerce::login.next')</button>
        </p>
    </form>


            </div>
        </div>
    </div>
@stop
