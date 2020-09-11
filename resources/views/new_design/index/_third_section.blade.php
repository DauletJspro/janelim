@php
    $currency = \App\Models\Currency::pvToKzt();
@endphp
<div class="col-xs-12">							
    <!-- mt producttabs style2 start here -->
    <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.6s">
        <!-- producttabs start here -->
        <div class="producttabs">
            <p class="producttabs_title">
                @lang('app.packets')
            </p>
        </div>								
        <!-- producttabs end here -->								
        <!-- tabs slider start here -->
        <div class="tabs-sliderlg">				
            @foreach ($packets as $packet)
                <!-- packet_card start here -->
                <div class="packet_card">
                    <!-- mt product start here -->
                    <div class="product-3">
                        <!-- img start here -->
                        <div class="img">
                            <img alt="image description" src="{{ $packet->packet_image }}">
                        </div>
                        <!-- txt start here -->
                        <div class="txt">
                            <strong class="title">{{ $packet->packet_name_ru }}</strong>
                            <span class="price"> {{ ($packet->packet_price * $currency) }} тг</span>
                            <p>{{ $packet->packet_thing }}</p>
                            <a href="{{ route('packet.detail',$packet->packet_id, ['id' => $packet->packet_id]) }}">@lang('app.read_more')</a>
                        </div>
                        <!-- links start here -->
                        {{-- <ul class="links">
                            <li><a href="#"
                                data-item-id="{{$packet->packet_id}}"
                                data-method="add"
                                data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                data-route="{{route('basket.isAjax')}}"
                                onclick="addItemToBasket(this)"    
                            ><i class="icon-handbag"></i></a></li>
                            <li><a href="#"
                                data-item-id="{{$packet->packet_id}}"
                                data-method="add"
                                data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                data-session-id="{{ Session::getId()}}"
                                data-route="{{route('favorite.isAjax')}}"
                                onclick="addItemToFavorites(this)"
                            ><i class="icomoon icon-heart-empty"></i></a></li>
                            <li><a href="#"><i class="icomoon fa fa-eye"></i></a></li>
                        </ul> --}}
                    </div><!-- mt product 3 end here -->
                </div><!-- packet_card end here -->
            @endforeach
        </div><!-- tabs slider end here -->
    </div><!-- mt producttabs end here -->
</div>