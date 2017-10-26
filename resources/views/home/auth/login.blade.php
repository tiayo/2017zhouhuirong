@extends('home.layouts.app')

@section('title', '登录')

@section('style')
    <style type="text/css">
        .content {
            width: 1000px;
            margin: 50px auto;
            padding: 10px 50px;
        }
        .content h1 {
            padding: 10px 10px 10px 25px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        .login-detial {
            width: 300px;
            margin: 10px auto;
        }
        .login-detial input {
            display: block;
            width: 100%;
            height: 35px;
            margin-top: 10px;
            outline: none;
            text-indent: 10px;
        }
        .login-btn {
            width: 302px;
            height: 35px;
            margin-top: 20px;
        }
        .login-btn button {
            display: inline-block;
            width: 100%;
            height: 100%;
            outline: none;
            border: 0;
            background-color: #b1181a;
            color: #fff;
            cursor: pointer;
        }
        .registration {
            display: block;
            width: 200px;
            height: 20px;
            margin: 20px auto;
            text-align: center;
            line-height: 20px;
        }
    </style>
@endsection

@section('body')
    @include('home.layouts.header')
    <form class="login" method="post" action="{{ route('home.login') }}">
        {{ csrf_field() }}
        <div class="content">
            <h1>欢迎登录</h1>
            <div class="login-detial">
                <div class="form-input">
                    <input type="email" name="email" placeholder="请输入邮箱"/>
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="请输入密码"/>
                </div>
                <div class="login-btn">
                    <button>登录</button>
                </div>
            </div>
            <a href="{{ route('home.register') }}" class="registration">还没有账号？点击注册</a>
        </div>
    </form>
@endsection