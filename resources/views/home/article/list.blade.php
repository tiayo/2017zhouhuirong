@extends('home.layouts.app')

@section('title', '花语列表')

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
        ul {
            float: left;
        }
        ul li {
            position: relative;
            float: left;
            width: 240px;
            margin: 5px;
            box-shadow: 1px 1px 5px #b1181a,
            -1px -1px 5px #b1181a;
        }
        ul li img {
            display: block;
            width: 240px;
            height: 240px;
        }
        ul li h2 {
            white-space:nowrap;
            overflow:hidden;
            text-overflow:ellipsis;
            width: 96%;
            padding: 2%;
            height: 40px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            line-height: 40px;
        }
        ul li .mask {
            display: none;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }
        ul li .mask a {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 80px;
            height: 35px;
            background-color: #b1181a;
            color: #fff;
            text-align: center;
            line-height: 35px;
        }
    </style>
@endsection

@section('body')
    <div class="news">
        @include('home.layouts.header')
        <div class="content">
            <h1>花语</h1>
            <ul>
                @foreach($lists as $list)
                    <li class="clearfix">
                        <h2>{{ $list['title'] }}</h2>
                        <div class="mask">
                            <a href="{{ route('home.article', ['article_id' => $list['id']]) }}">查看花语</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        $("ul li").hover(function() {
            $(this).children('.mask').show();
        }, function() {
            $(this).children('.mask').hide();
        });
    </script>
@endsection