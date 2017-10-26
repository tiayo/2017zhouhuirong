@extends('home.layouts.app')

@section('title', $commodity['name'])

@section('style')
    <style type="text/css">
        .content {
            width: 1000px;
            margin: 50px auto;
        }
        .swiper-slide {
            height: 300px;
        }
        .choose {
            height: 45px;
            margin-top: 20px;
            background-color: #b1181a;
        }
        .choose .ys,
        .choose .sl {
            float: left;
            height: 100%;
            padding: 0 20px;
        }
        .choose .ys h1,
        .choose .sl h1 {
            float: left;
            height: 100%;
            padding-right: 20px;
            line-height: 45px;
            color: #fff;
        }
        .choose .ys select,
        .choose .sl select {
            width: 120px;
            height: 25px;
            margin-top: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
        }
        .choose .join-cart {
            float: left;
            height: 35px;
            padding: 0 10px;
            margin-top: 5px;
            margin-left: 20px;
            outline: none;
            border: 0;
            background-color: #f3f3f3;
            color: orangered;
            text-align: center;
            line-height: 35px;
            cursor: pointer;
        }
        .c-bottom {
            margin-top: 50px;
            padding: 0 50px;
        }
        .swiper-wrapper {
            height: 300px;
        }
        .swiper-wrapper img {
            float: left;
            width: 300px;
        }
    </style>
@endsection

@section('body')
       @include('home.layouts.header')
       <form class="goods-details" method="post" action="{{ route('home.car_add', ['commodity_id' => $commodity['id']]) }}">
           {{ csrf_field() }}
           <div class="content">
               <div class="swiper-container">
                   <div class="swiper-wrapper">
                       @for($i=0; $i<9; $i++)
                           @if (!empty($commodity['image_'.$i]))
                               <div class="swiper-slide">
                                   <img src="{{ $commodity['image_'.$i] }}"/>
                               </div>
                           @endif
                       @endfor
                   </div>
               </div>
               <div class="choose">
                   @foreach($attributes as $attribute)
                       <div class="ys clearfix">
                           <h1>{{ $attribute['name'] }}</h1>
                           <select name="attribute[{{ $attribute['name'] }}]">
                               @foreach(explode(',', $attribute['value']) as $value)
                                   <option value ="{{ $value }}">{{ $value }}</option>
                               @endforeach
                           </select>
                       </div>
                   @endforeach
                       <div class="ys clearfix">
                           <h1>数量</h1>
                           <select name="num">
                               @for ($i=1; $i<=20; $i++)
                                   <option value ="{{ $i }}">{{ $i }}</option>
                               @endfor
                           </select>
                       </div>

                       <button type="submit" class="join-cart">加入购物车</button>
               </div>
               <div class="c-bottom">
                   {!! $commodity['description'] !!}
               </div>
           </div>
       </form>
       <script type="text/javascript">
           var swiper = new Swiper('.swiper-container', {
               pagination: '.swiper-pagination',
               loop: true,
               slidesPerView: 3,
               paginationClickable: true,
               spaceBetween: 30,
               autoplay: 2000
           });

           $(document).ready(function () {
               $('#category_0').removeClass('nav-on');
               $('#category_{{ $commodity['category_id'] }}').addClass('nav-on');
           });
       </script>
@endsection