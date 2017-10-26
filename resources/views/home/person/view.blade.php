@extends('home.layouts.app')

@section('title', '个人中心')

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
        .or-choose {
            margin-top: 20px;
            background-color: #b1181a;
            border: 1px solid #b1181a;
            color: #fff;
        }
        .or-choose li {
            float: left;
            width: 25%;
            height: 35px;
            text-align: center;
            line-height: 35px;
            cursor: pointer;
        }
        .or-choose .on {
            color: #b1181a;
            font-weight: bold;
            background-color: #fff
        }
        .or-details {
            display: none;
            margin-top: 10px;
        }
        .or-details li {
            margin-top: 10px;
            border: 1px solid #b1181a;
        }
        .or-details li h2 {
            height: 30px;
            padding-left: 10px;
            background-color: #b1181a;
            color: #fff;
            font-size: 16px;
            line-height: 30px;
        }
        .or-info {
            padding: 10px;
            border-bottom: 1px solid #b1181a;
        }
        .or-info h3 {
            float: left;
            padding: 0 10px;
            border-right: 1px dashed #b1181a;
        }
        .list {
            float: left;
            width: 19%;
            overflow: hidden;
            margin-right: 1%;
        }
        .list img {
            display: block;
            width: 199px;
            height: 199px;
        }
        .list h3 {
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
        .list h4 {
            color: #999;
            text-align: center;
        }
        .list h5 {
            margin: 10px 0;
            color: #f00;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
    </style>
@endsection

@section('body')
    <div class="pc">
        @include('home.layouts.header')
        <div class="content clearfix">
            <h1>我的订单</h1>
            <ul class="or-choose clearfix">
                <li class="on">全部</li>
                <li>待发货</li>
                <li>待收货</li>
                <li>已完成</li>
            </ul>
            <ul class="or-details" style="display:block">
                @foreach($orders_all as $order)
                    <li>
                        <h2>订单详情（<span>{{ config('site.order_status')[$order['status']] }}</span>）订单金额：￥<em>{{ $order['price'] }}</em></h2>
                        <div class="or-info clearfix">
                            <h3>订单编号：<em>{{ time().$order['id'] }}</em></h3>
                            <h3>配送方式：<em>商家配送</em></h3>
                            <h3>付款方式：<em>支付宝</em></h3>
                            <h3>付款时间：<em>{{ $order['created_at'] }}</em></h3>
                            <h3>收件人：<em>{{ $order['name'] }}</em></h3>
                            <h3>联系电话：<em>{{ $order['phone'] }}</em></h3>
                            <h3>收件地址：<em>{{ $order['address'] }}</em></h3>
                        </div>
                        <div class="or-list clearfix">
                            @foreach($order->orderDetail as $list_detail)
                                <div class="list">
                                    <img src="{{ $list_detail->commodity->image_0 }}">
                                    <h3>{{ $list_detail->commodity->name }}</h3>
                                    <h4>商品规格：<em>{{ $list_detail['remark'] }}</em></h4>
                                    <h4>商品数量：<em>{{ $list_detail['num'] }}</em></h4>
                                    <h5>￥
                                        <em>
                                            {{ $list_detail['num'] * $list_detail['price'] }}
                                        </em>
                                    </h5>
                                </div>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
            <ul class="or-details">
                @foreach($orders_1 as $order)
                    <li>
                        <h2>订单详情（<span>{{ config('site.order_status')[$order['status']] }}</span>）订单金额：￥<em>{{ $order['price'] }}</em></h2>
                        <div class="or-info clearfix">
                            <h3>订单编号：<em>{{ time().$order['id'] }}</em></h3>
                            <h3>配送方式：<em>商家配送</em></h3>
                            <h3>付款方式：<em>支付宝</em></h3>
                            <h3>付款时间：<em>{{ $order['created_at'] }}</em></h3>
                            <h3>收件人：<em>{{ $order['name'] }}</em></h3>
                            <h3>联系电话：<em>{{ $order['phone'] }}</em></h3>
                            <h3>收件地址：<em>{{ $order['address'] }}</em></h3>
                        </div>
                        <div class="or-list clearfix">
                            @foreach($order->orderDetail as $list_detail)
                                <div class="list">
                                    <img src="{{ $list_detail->commodity->image_0 }}">
                                    <h3>{{ $list_detail->commodity->name }}</h3>
                                    <h4>商品规格：<em>{{ $list_detail['remark'] }}</em></h4>
                                    <h4>商品数量：<em>{{ $list_detail['num'] }}</em></h4>
                                    <h5>￥
                                        <em>
                                            {{ $list_detail['num'] * $list_detail['price'] }}
                                        </em>
                                    </h5>
                                </div>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
            <ul class="or-details">
                @foreach($orders_2 as $order)
                    <li>
                        <h2>订单详情（<span>{{ config('site.order_status')[$order['status']] }}</span>）订单金额：￥<em>{{ $order['price'] }}</em></h2>
                        <div class="or-info clearfix">
                            <h3>订单编号：<em>{{ time().$order['id'] }}</em></h3>
                            <h3>配送方式：<em>商家配送</em></h3>
                            <h3>付款方式：<em>支付宝</em></h3>
                            <h3>付款时间：<em>{{ $order['created_at'] }}</em></h3>
                            <h3>收件人：<em>{{ $order['name'] }}</em></h3>
                            <h3>联系电话：<em>{{ $order['phone'] }}</em></h3>
                            <h3>收件地址：<em>{{ $order['address'] }}</em></h3>
                        </div>
                        <div class="or-list clearfix">
                            @foreach($order->orderDetail as $list_detail)
                                <div class="list">
                                    <img src="{{ $list_detail->commodity->image_0 }}">
                                    <h3>{{ $list_detail->commodity->name }}</h3>
                                    <h4>商品规格：<em>{{ $list_detail['remark'] }}</em></h4>
                                    <h4>商品数量：<em>{{ $list_detail['num'] }}</em></h4>
                                    <h5>￥
                                        <em>
                                            {{ $list_detail['num'] * $list_detail['price'] }}
                                        </em>
                                    </h5>
                                </div>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
            <ul class="or-details">
                @foreach($orders_4 as $order)
                    <li>
                        <h2>订单详情（<span>{{ config('site.order_status')[$order['status']] }}</span>）订单金额：￥<em>{{ $order['price'] }}</em></h2>
                        <div class="or-info clearfix">
                            <h3>订单编号：<em>{{ time().$order['id'] }}</em></h3>
                            <h3>配送方式：<em>商家配送</em></h3>
                            <h3>付款方式：<em>支付宝</em></h3>
                            <h3>付款时间：<em>{{ $order['created_at'] }}</em></h3>
                            <h3>收件人：<em>{{ $order['name'] }}</em></h3>
                            <h3>联系电话：<em>{{ $order['phone'] }}</em></h3>
                            <h3>收件地址：<em>{{ $order['address'] }}</em></h3>
                        </div>
                        <div class="or-list clearfix">
                            @foreach($order->orderDetail as $list_detail)
                                <div class="list">
                                    <img src="{{ $list_detail->commodity->image_0 }}">
                                    <h3>{{ $list_detail->commodity->name }}</h3>
                                    <h4>商品规格：<em>{{ $list_detail['remark'] }}</em></h4>
                                    <h4>商品数量：<em>{{ $list_detail['num'] }}</em></h4>
                                    <h5>￥
                                        <em>
                                            {{ $list_detail['num'] * $list_detail['price'] }}
                                        </em>
                                    </h5>
                                </div>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        $(".or-choose li").click(function() {
            $(this).addClass('on').siblings().removeClass('on');
            $(".or-details").hide().eq($(".or-choose li").index(this)).show();
        });
    </script>
@endsection