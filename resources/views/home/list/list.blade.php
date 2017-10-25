@inject('commodiy_class', 'App\Repositories\CommodityRepository')
@inject('index_class', 'App\Services\Home\IndexService')
@inject('category_class', 'App\Services\Manage\CategoryService')

@extends('home.layouts.app')

@section('title', '商品列表')
@section('class', 'goods-list')

@section('body')
    <div class="fenlei">
        @include('home.layouts.header')
        <div class="goods1">
            <h1>{{ $category['name'] }}</h1>
            <ul class="goods-list clearfix">
                @foreach($comodities as $comodity)
                    <li class="list">
                        <img src="{{ $comodity['image_0'] }}"/>
                        <a href="{{ route('home.commodity_view', ['commodity_id' => $comodity['id']]) }}">
                            <span>{{ $comodity['name'] }}</span>
                            <strong>￥<em>{{ $comodity['price'] }}</em></strong>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
@section('script')
@endsection