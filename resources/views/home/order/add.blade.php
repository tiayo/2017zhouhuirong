@extends('home.layouts.app')

@section('title', '订单确认')
@section('class', 'order-clearing')
@section('id', 'app')

@section('style')
    <script src="{{ asset('/style/home/js/vue.js') }}"></script>
    <style type="text/css">
        .content {
            width: 1000px;
            padding: 20px 0;
            margin: 20px auto;
        }
        .content h1 {
            padding: 15px;
            font-size: 24px;
        }
        .orfl {
            float: left;
            padding: 10px 20px;
            box-shadow: 1px 1px 5px orangered;
        }
        .orfl li {
            height: 32px;
            line-height: 32px;
        }
        .orfl li label {
            height: 100%;
            font-size: 16px;
        }
        .orfl input {
            width: 300px;
        }
        .input-name {
            margin-left: 29px;
        }
        .input-tel {
            margin-left: 45px;
        }
        .input-address {
            margin-left: 13px;
        }
        .orfm {
            float: left;
            height: 96px;
            padding: 10px 20px;
            margin-left: 20px;
            box-shadow: 1px 1px 5px orangered;
        }
        .orfm li {
            height: 25px;
        }
        .orfr {
            float: left;
            height: 96px;
            padding: 10px 20px;
            margin-left: 20px;
            box-shadow: 1px 1px 5px orangered;
        }
        .orfr .all-price {
            height: 50px;
            font-size: 20px;
            font-weight: bold;
            line-height: 50px;
        }
        .orfr .all-price span {
            color: #f00;
        }
        .orfr .or-button {
            width: 100%;
            height: 30px;
            margin-top: 10px;
            background-color: #fff;
            box-shadow: 1px 1px 5px orangered;
            outline: none;
            border: 0;
            cursor: pointer;
        }
        .or-details {
            float: left;
            margin-top: 10px;
        }
        .or-details li {
            float: left;
            margin: 5px;
            box-shadow: 1px 1px 5px orangered,
            -1px -1px 5px orangered;
        }
        .or-details li img {
            float: left;
            width: 198px;
            height: 198px;
        }
        .or-details li h2 {
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
        .or-details li h3 {
            color: #999;
            text-align: center;
        }
        .or-details li h4 {
            margin: 10px 0;
            color: #f00;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        .list {
            float: left;
            width: 198px;
        }
    </style>
@endsection

@section('body')
    @include('home.layouts.header')
    <form class="order-clearing" action="{{ route('home.order_add') }}" method="post">
        {{ csrf_field() }}
        <div class="content clearfix" id="content">
            <h1>订单详情</h1>
            <div class="order-info clearfix">
                <ul class="orfl">
                    <li>
                        <label for="">收件人：</label>
                        <input type="text" name="name" class="input-name" v-model="name"/>
                    </li>
                    <li>
                        <label for="">电话号码：</label>
                        <input type="text" name="phone" class="input-tel" v-model="tel"/>
                    </li>
                    <li>
                        <label for="">收件地址：</label>
                        <input type="text" name="address" class="input-address" v-model="address"/>
                    </li>
                    <li>
                        商品总金额：￥<em>{{ $total_price }}</em>
                    </li>
                </ul>
                <ul class="orfm">
                    <li>
                        配送方式：<em>普通快递</em>
                    </li>
                    <li>
                        订单号：<em>未生成</em>
                    </li>
                    <li>
                        付款方式：<em>支付宝</em>
                    </li>
                    <li>
                        付款时间：<em>未付款</em>
                    </li>
                </ul>
                <div class="orfr">
                    <div class="all-price">订单总价：<span>￥<em>{{ $total_price }}</em></span></div>
                    <button class="or-button confirm">提交订单</button>
                </div>
            </div>
            <ul class="or-details">
                <li class="clearfix">
                    @foreach($cars as $car)
                        @php
                            $attributes = explode('|', $car['remark']);
                        @endphp
                        <div class="list">
                            <img src="{{ $car->commodity->image_0 }}"/>
                            <h2>{{ $car->commodity->name }}</h2>
                            @foreach($attributes as $attribute)
                                @php
                                    $attribute = explode(':', $attribute)
                                @endphp
                                <h3>{{ $attribute[0] }}：<em>{{ $attribute[1] }}</em></h3>
                            @endforeach
                            <h3>数量：<em>{{ $car['num'] }}</em></h3>
                            <h4>￥<em>{{ $car['price'] * $car['num'] }}</em></h4>
                        </div>
                    @endforeach
                </li>
            </ul>
        </div>
    </form>
    <script type="text/javascript">
        var app = new Vue({
            el: '#content',
            data: {
                name: '{{ Auth::user()['name'] }}',
                tel: '{{ Auth::user()['phone'] }}',
                address: '{{ Auth::user()['address'] }}',
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#category_0').removeClass('nav-on');
        });
    </script>
@endsection