<?php
$currency = \App\Models\Currency::pvToKzt();
$userPacket = \App\Models\UserPacket::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->user_id])->first();
?>

@extends('admin.layout.layout')
@section('breadcrump')
@endsection
@section('content')
    <div class="row profits">
        <div style="padding-left: 2rem;"><h3 style="font-size: 3rem;">Реферальный бонус</h3></div>
        <div class="col-sm-6 col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">На сегодня</h5>
                    <p class="card-text">{{round($pvData['pvProfitToday'],2)}} $</p>
                    <p class="card-text">{{round($pvData['pvProfitToday'] * \App\Models\Currency::DollarToKzt,2)}} &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За последнюю неделю</h5>
                    <p class="card-text">{{round($pvData['pvProfitLastWeek'],2)}} $</p>
                    <p class="card-text">{{round($pvData['pvProfitLastWeek'] * \App\Models\Currency::DollarToKzt,2)}} &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За последний месяц</h5>
                    <p class="card-text">{{round($pvData['pvProfitLastMonth'],2)}} $</p>
                    <p class="card-text">{{round($pvData['pvProfitLastMonth'] * \App\Models\Currency::DollarToKzt,2)}} &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За весь период</h5>
                    <p class="card-text">{{round($pvData['pvProfitAll'],2)}} $</p>
                    <p class="card-text">{{round($pvData['pvProfitAll'] * \App\Models\Currency::DollarToKzt,2)}} &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>

    </div>
    <div class="row profits">
        <div style="padding-left: 2rem;"><h3 style="font-size: 3rem;">Группавой Обьем</h3></div>
        <div class="col-sm-6 col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">На сегодня</h5>
                    <p class="card-text">{{round($gvData['gvProfitToday'],2)}} gv</p>
                    <p class="card-text">{{round($gvData['gvProfitToday'] * \App\Models\Currency::GVtoKzt,2)}} &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За последнюю неделю</h5>
                    <p class="card-text">{{round($gvData['gvProfitLastWeek'],2)}} gv</p>
                    <p class="card-text">{{round($gvData['gvProfitLastWeek'] * \App\Models\Currency::GVtoKzt,2)}} &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За последний месяц</h5>
                    <p class="card-text">{{round($gvData['gvProfitLastMonth'],2)}} gv</p>
                    <p class="card-text">{{round($gvData['gvProfitLastMonth'] * \App\Models\Currency::GVtoKzt,2)}} &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6  col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За весь период</h5>
                    <p class="card-text">{{round($gvData['gvProfitAll'],2)}} gv</p>
                    <p class="card-text">{{round($gvData['gvProfitAll'] * \App\Models\Currency::GVtoKzt,2)}} &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>

    </div>
    <div class="row profits">
        <div style="padding-left: 2rem;"><h3 style="font-size: 3rem;">Текущий счет</h3></div>
        <div class="col-sm-6 col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">В долларах</h5>
                    <p class="card-text">{{Auth::user()->user_money}} $</p>
                    <p class="card-text">{{Auth::user()->user_money * App\Models\Currency::DollarToKzt}} &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>

    </div>
    <div class="row packets">
        <div style="padding-left: 2rem;"><h3 style="font-size: 3rem;">Мои пакеты</h3></div>
        @foreach ($userPackets as $packet)
            <div class="card  col-sm-6 col-lg-3 col-xs-12 col-md-6" style="margin-top: 20px;">
                <div class="card-body" style="position:relative;background-color:{{'#' . $packet->packet->packet_css_color}}">
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
        @endforeach
    </div>
@endsection

<style>
    .profits .card {
        padding: 20px;
        font-size: 2rem;
        border: 3px solid green;
        border-radius: 5px;
    }

    .profits .card-text {
        font-size: 3rem;
        font-weight: bolder;
        color: green;
    }

    .profits .card-title {
        font-size: 3rem;
    }

    .profits .card-body a {
        width: 100%;
        font-size: 2rem
    }


    .packets  .card {
        padding: 15px;
    }

    .packets  .card-title {
        font-family: "Consolas", "Monaco", "Bitstream Vera Sans Mono", "Courier New", Courier, monospace;
        font-weight: bold;
    }

    .packets  .card-body {
        font-weight: bold;
        border: 1px solid #000000;
        border-radius: 4px;
        padding: 10px;
    }

    .packets  .card-body a {
        width: 100%;
        height: 100%;
        font-weight: bold;
        font-size: 2rem;
        color: white;
    }

    .packets  .card-text {
        border: 1px solid white;
        border-radius: 4px;
        padding: 5px;
        padding-left: 3px;
        color: white;
        font-size: 1.5rem;
        font-weight: bolder;
        font-family: "Consolas", "Monaco", "Bitstream Vera Sans Mono", "Courier New", Courier, monospace;
    }

    .packets  #bag-icon {
        position: absolute;
        right: 3rem;
        top: 25px;
    }

    .packets  #bag-icon i {
        font-weight: bold;
        font-size: 4rem;
        color: white;
    }

</style>


