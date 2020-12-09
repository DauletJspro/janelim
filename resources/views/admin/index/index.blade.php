<?php
$currency = \App\Models\Currency::pvToKzt();
$userPacket = \App\Models\UserPacket::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->user_id])->first();
?>

@extends('admin.layout.layout')
@section('breadcrump')
@endsection
@section('content')
@include('admin.index.referral_bonus')
@include('admin.index.group_volume')
@include('admin.index.money')



    <div class="row packets">
        @foreach ($userPackets as $packet)
            <div style="padding-left: 2rem"><h3 style="font-size: 3rem;">Мои пакеты</h3></div>
            <div class="card  col-sm-6 col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
                <div class="card-body text-center" style="position:relative;background-color:{{'#' . $packet->packet->packet_css_color}}">
                    <h2 class="card-title">{{$packet->packet->packet_name_ru}}</h2>
                    <h3 style="font-weight: bold;">{{$packet->packet->packet_price - \App\Models\UserPacket::userHasPacketsPrice($packet->packet->packet_id)}} pv
                        &emsp;
                        {{($packet->packet->packet_price - \App\Models\UserPacket::userHasPacketsPrice($packet->packet->packet_id)) * $currency}}
                        &#8376;</h3>
                    <p class="card-text">
                        {{$packet->packet->packet_thing}}
                    </p>
                    <div id="bag-icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <div class="card-body text-center" style="padding: 1px;">
                        <div class="small-box yellow">
                            <div class="inner">
                        @if(\App\Models\UserPacket::hasPacket($packet->packet_id))
                            @if(\App\Models\UserPacket::isActive($packet->packet_id))
                                <a class="small-box-footer shop_buy_btn" style="font-size: 18px">Вы уже приобрели</a>
                            @else
                                <a style="padding: 1px;" href="javascript:void(0)"
                                   onclick="cancelResponsePacket(this,'{{$packet->packet_id}}')"
                                   class="btn transparent shop_buy_btn">Отменить запрос <i
                                            class="fa fa-arrow-right"></i></a>
                            @endif
                        @else
                            <a href="javascript:void(0)" onclick="showBuyModal(this,'{{$packet->packet_id}}')"
                               class="buy_btn_{{$packet->packet_id}} shop_buy_btn btn  transparent">Купить пакет <i
                                        class="fa fa-arrow-right"></i></a>
                        @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
</div>
