<div class="col-xs-12">							
    <!-- mt producttabs style2 start here -->
    <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.6s">
        <!-- producttabs start here -->
        <div class="producttabs">
            <p class="producttabs_title">
                Пакеттер
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
                            <span class="price"> {{ $packet->packet_price * 600 }} тг</span>
                        </div>
                    </div><!-- mt product 3 end here -->
                </div><!-- packet_card end here -->
            @endforeach
        </div><!-- tabs slider end here -->
    </div><!-- mt producttabs end here -->
</div>