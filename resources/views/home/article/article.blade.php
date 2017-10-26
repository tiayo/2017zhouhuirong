@extends('home.layouts.app')

@section('title', '资讯列表')

@section('style')
    <style type="text/css">
        .content {
            width: 1000px;
            margin: 50px auto;
            padding: 10px 50px;
        }
        .content h1 {
            padding: 15px;
            font-size: 24px;
        }
        .con {
            padding: 15px;
        }
    </style>
@endsection

@section('body')
    <div class="news-details">
        @include('home.layouts.header')
        <div class="content">
            <h1>{{ $article['title'] }}</h1>
            <div class="con">
                {!! $article['content'] !!}
            </div>
        </div>
    </div>
@endsection