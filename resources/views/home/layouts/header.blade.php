@inject('index', 'App\Services\Home\IndexService')
<style>
    .nav .nav-con .nav-on {
        color: #fff;
        background-color: #666;
    }
    .nav .nav-con a {
        line-height: 45px;
    }
    .header .nowTime {
        margin-left: 0;
    }
</style>

<div class="header">
    <div class="header-con">
        @if (Auth::check())
            <a href="{{ route('home.person') }}" class="pc-button" style="margin-right: 1em;">个人中心</a>
            <a href="{{ route('home.logout') }}" class="login-button">退出</a>
        @else
            <a href="{{ route('home.login') }}" class="login-button">登录/注册</a>
        @endif
        <a href="{{ route('home.car') }}" class="shopping-cart-button">购物车</a>
        <span class="nowTime">您好，现在是:<em>{{ date('Y-m-d H:i:s') }}</em></span>
    </div>
</div>
<div class="nav">
    <div class="nav-con">
        <a href="/" id="category_0" class="nav-on">首页</a>
        @foreach($index->getCategoryParent() as $category)
            <a id="category_{{ $category['id'] }}" href="{{ route('home.category_view', ['id' => $category['id']]) }}">
                {{ $category['name'] }}
            </a>
        @endforeach
    </div>
</div>