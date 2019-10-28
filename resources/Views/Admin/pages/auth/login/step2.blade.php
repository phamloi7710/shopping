@extends('woo-commerce::admin.pages.auth.master')
@section('content')
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
{{--        <div class="lockscreen-logo">--}}
{{--            <a href="../../index2.html"><b>Admin</b>LTE</a>--}}
{{--        </div>--}}
        <!-- User name -->
        <div class="lockscreen-name"> {{$user ? $user->name : ''}}</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="{{$user->avatar ? $user->avatar : asset('app-assets/dist/img/user4-128x128.jpg')}}" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form action="{{route('postLoginAdmin')}}" method="POST" class="lockscreen-credentials">
                @csrf
                <div class="input-group">
                    <input name="txtPassword" type="password" class="form-control" placeholder="@lang('woo-commerce::login.placeholder.password')">
                    <div class="input-group-append">
                        <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            @lang('woo-commerce::login.enter_your_password_to_retrieve_your_session')
        </div>
        <div class="text-center">
            <a href="{{route('getCheckUsername')}}">@lang('woo-commerce::login.or_sign_in_as_a_different_user')</a>
        </div>
        <div class="lockscreen-footer text-center">
            Copyright &copy; 2014-2019 <b><a href="http://adminlte.io" class="text-black">AdminLTE.io</a></b><br>
            All rights reserved
        </div>
    </div>
@stop
