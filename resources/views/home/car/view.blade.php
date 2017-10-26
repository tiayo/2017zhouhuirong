@extends('home.layouts.app')

@section('title', Auth::user()['name'].'的购物车')

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
        .all-price {
            padding: 0 15px;
            height: 40px;
            line-height: 40px;
        }
        .all-price span {
            font-size: 18px;
            font-weight: bold;
        }
        .all-price .tijiao {
            float: right;
            background-color: #b1181a;
            outline: none;
            border: 0;
            color: #fff;
            width: 100px;
            height: 30px;
            margin-left: 20px;
            box-shadow: 1px 1px 5px #000;
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
        ul li h3 {
            color: #999;
            text-align: center;
        }
        ul li h4 {
            margin: 10px 0;
            color: #f00;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        ul li .del {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 25px;
            height: 25px;
            background-color: #f3f3f3;
            color: #999;
            text-align: center;
            line-height: 25px;
            cursor: pointer;
        }
    </style>
@endsection

@section('body')
    @include('home.layouts.header')
    <form class="shopping-cart">
        <div class="content clearfix">
            <h1>购物车</h1>
            <div class="all-price">
                <span>订单总价：￥<em>{{ $total_price }}</em></span>
                <button class="tijiao" type="button" onclick="location='{{ route('home.order_add') }}'">提交订单</button>
            </div>
            <ul>
                @foreach($lists as $list)
                    @php
                        $attributes = explode('|', $list['remark']);
                    @endphp
                    <li class="clearfix">
                        <img src="{{ $list->commodity->image_0 ?? null }}"/>
                        <h2>{{ $list->commodity->name ?? '未找到' }}</h2>
                        @foreach($attributes as $attribute)
                            @php
                                $attribute = explode(':', $attribute)
                            @endphp
                            <h3>{{ $attribute[0] }}：<em>{{ $attribute[1] }}</em></h3>
                        @endforeach
                        <h3>数量：<em>{{ $list['num'] }}</em></h3>
                        <h4>合计：￥<em>{{ $list['price'] * $list['num'] }}</em></h4>
                        <span class="del" onclick="location='{{ route('home.car_destory', ['car_id' => $list['id']]) }}'">x</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $('#category_0').removeClass('nav-on');
        });
    </script>
@endsection