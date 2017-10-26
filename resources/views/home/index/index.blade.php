@inject('index', 'App\Services\Home\IndexService')

@extends('home.layouts.app')

@section('title', '首页')

@section('style')
    <style type="text/css">
        .content {
            width: 1000px;
            margin: 20px auto;
        }
        .index-nav {
            float: left;
            width: 300px;
            background-color: orangered;
            color: #fff;
            height: 469px;
        }
        .index-nav h1 {
            height: 30px;
            background-color: orange;
            text-align: center;
            line-height: 30px;
        }
        .nav1 {
            padding: 10px;
        }
        .nav1 h2 {
            height: 30px;
            line-height: 30px;
        }
        .nav2 li {
            float: left;
            height: 20px;
            padding: 5px;
            text-align: center;
            line-height: 20px;
        }
        .nav2 li a{
            color: orange;
        }
        .index-bigpic {
            float: right;
            width: 690px;
        }
        .index-bigpic img {
            float: left;
            width: 100%;
        }
        .con-mid {
            margin-top: 20px;
        }
        .banner {
            float: right;
            width: 690px;
            margin-top: 20px;
        }
        .banner img {
            float: left;
            width: 220px;
            height: 206px;
        }
        .banner img:nth-child(2) {
            margin: 0 15px;
        }
        .banner-left {
            float: left;
            width: 200px;
            margin-right: 20px;
            margin-bottom: 10px;
        }
        .banner-left img {
            float: left;
            width: 100%;
        }
        .mid-right {
            position: relative;
            float: left;
            width: 246px;
            height: 356px;
            margin-right: 20px;
            margin-bottom: 10px;
        }
        .mid-right:nth-child(4) {
            margin-right: 0;
        }
        .mid-right h1 {
            overflow: hidden;
            float: left;
            width: 100%;
            height: 49%;
            color: #999;
            text-align: center;
        }
        .mid-right img {
            float: left;
            width: 100%;
            height: 51%;
        }
        .mid-right .mask {
            display: none;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .mid-right .mask a {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 80px;
            height: 35px;
            background-color: orangered;
            color: #fff;
            text-align: center;
            line-height: 35px;
        }
        .swiper-containerScenic {
            overflow: hidden;
        }
        .scenic {
            padding: 0 15px;
            height: 45px;
            font-size: 18px;
            font-weight: bold;
            border-top: 1px solid #999;
            border-bottom: 1px solid #999;
            line-height: 45px;
            margin-bottom: 10px;
        }
        .scenic-title {
            height: 40px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            line-height: 40px;
            border-bottom: 1px dashed #999;
        }
        .scenic-con {
            padding: 5px 10px;
            height: 175px;
            overflow: hidden;
        }
        .scenic-details {
            float: left;
            width: 97%;
            height: 25px;
            padding-left: 3%;
            border-top: 1px dashed #999;
            line-height: 25px;
        }
    </style>
@endsection

@section('body')
    <div class="index">
        @include('home.layouts.header')
        <div class="content clearfix">
            <div class="con-top clearfix">
                <div class="index-nav">
                    <h1>所有分类</h1>
                    <ul class="nav1">
                        @foreach($parent_ctegory as $category)
                            <li>
                                <h2>{{ $category['name'] }}</h2>
                                <ul class="nav2 clearfix">
                                    @foreach($index->getCategoryChildren($category['id']) as $children)
                                        <li>
                                            <a href="{{ route('home.category_view', ['id' => $children['id']]) }}">{{ $children['name'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="index-bigpic swiper-container clearfix">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#"><img src="{{ asset('/style/home/images/bg1.jpg') }}"/></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img src="{{ asset('/style/home/images/bg2.jpg') }}"/></a>
                        </div>
                    </div>
                </div>
                <div class="banner">
                    @foreach($rand_commodity as $commodity)
                        <a href="{{ route('home.commodity_view', ['commodity_id' => $commodity['id']]) }}"><img src="{{ $commodity['image_0'] }}"/></a>
                    @endforeach
                </div>
            </div>
            <div class="con-mid clearfix">
                <div class="banner-left">
                    <img src="{{ asset('/style/home/images/tiao1.jpg') }}"/>
                </div>
                @foreach($commodities_1 as $commodity)
                    <div class="mid-right">
                        <h1>{{ mb_substr(strip_tags($commodity['description']), 0, 200, 'utf-8') }}...</h1>
                        <img src="{{ $commodity['image_0'] }}"/>
                        <div class="mask">
                            <a href="{{ route('home.commodity_view', ['commodity_id' => $commodity['id']]) }}">查看详情</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="con-mid clearfix">
                <div class="banner-left">
                    <img src="{{ asset('/style/home/images/tiao2.jpg') }}"/>
                </div>
                @foreach($commodities_2 as $commodity)
                    <div class="mid-right">
                        <h1>{{ mb_substr(strip_tags($commodity['description']), 0, 200, 'utf-8') }}...</h1>
                        <img src="{{ $commodity['image_0'] }}"/>
                        <div class="mask">
                            <a href="{{ route('home.commodity_view', ['commodity_id' => $commodity['id']]) }}">查看详情</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="con-bottom">
                <div class="swiper-containerScenic">
                    <div class="scenic">花语</div>
                    <div class="swiper-wrapper">
                        @foreach($articles as $article)
                            <div class="swiper-slide">
                                <div class="scenic-title">{{ $article['title'] }}</div>
                                <div class="scenic-con">>{{ mb_substr(strip_tags($article['content']), 0, 200, 'utf-8') }}...</div>
                                <a href="{{ route('home.article', ['article_id' => $article['id']]) }}" class="scenic-details">查看详情</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var mydate = new Date();
        var time = "" + mydate.getFullYear() + "年";
        time += (mydate.getMonth()+1) + "月";
        time += mydate.getDate() + "日";
        $(".nowTime em").html(time);
        $(".nav .nav-con a").click(function() {
            $(".nav .nav-con a").removeClass('nav-on');
            $(this).addClass('nav-on');
        });
        $(".mid-right").hover(function() {
            $(this).children('.mask').show();
        }, function() {
            $(this).children('.mask').hide();
        });

        var swiper = new Swiper('.swiper-containerScenic', {
            autoplay: 3000,
            loop: true,
            slidesPerView: 3,
            paginationClickable: true,
            spaceBetween: 30
        });
    </script>
@endsection