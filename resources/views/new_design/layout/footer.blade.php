<!-- footer of the Page -->
<footer id="mt-footer" class="style5 wow fadeInUp" data-wow-delay="0.4s">
    <!-- Footer Holder of the Page -->
    <div class="footer-holder black">
        <div class="container-fluid">
            <div class="row">
                <nav class="col-xs-12 col-sm-8 col-md-9">
                    <!-- Footer Nav of the Page -->
                    <div class="nav-widget-1">
                        <h3 class="f-widget-heading"> @lang('app.contact')</h3>
                        <ul class="list-unstyled f-widget-nav">
                            <li> @lang('app.footer_text') </li>
                            <li><i class="fa fa-map-marker"></i> &nbsp; <address style="display: inline-block; margin-bottom: 0px;"> @lang('app.footer_address') </address></li>                            
                            <li><i class="fa fa-phone"></i> &nbsp; <a href="tel:+77019150511">+7 (701) 915 05 11</a></li>
                            <li><i class="fa fa-envelope-o"></i> &nbsp; <a href="mailto:janelim.kz@gmail.com">janelim.kz@gmail.com</a></li>
                        </ul>
                    </div><!-- Footer Nav of the Page end -->
                    <!-- Footer Nav of the Page -->
                    <div class="nav-widget-1">
                        <h3 class="f-widget-heading"> @lang('app.info') </h3>
                        <ul class="list-unstyled f-widget-nav">
                            <li><a href="/about-us"> @lang('app.about_us')</a></li>
                            <li><a href="{{ route('favorite.showUserItem') }}"> @lang('app.favorites')</a></li>
                            <li><a href="{{ route('basket.show') }}">@lang('app.basket')</a></li>
                            <li><a href="{{ route('contact.show') }}">@lang('app.contact')</a></li>
                        </ul>
                    </div>
                    <!-- Footer Nav of the Page end -->
                    <!-- Footer Nav of the Page -->
                    <div class="nav-widget-1">
                        <h3 class="f-widget-heading">@lang('app.opportunities')</h3>
                        <ul class="list-unstyled f-widget-nav">                            
                            <li><a href="/opportunity">@lang('app.opportunities')</a></li>
                            <li><a href="#"> @lang('app.rule_condition')</a></li>
                            <li><a href="#">@lang('app.politic_conf')</a></li>
                        </ul>
                    </div><!-- Footer Nav of the Page end -->                     
                </nav>
                <div class="col-xs-12 col-sm-4 col-md-3 text-right">
                    <!-- F Widget Newsletter of the Page -->
                    <div class="f-widget-newsletter">
                        <h3 class="f-widget-heading">@lang('app.subscribe')</h3>
                        <div class="holder">
                            <form action="#" class="newsletter-form">
                                <fieldset>
                                    <input type="email" placeholder="Your Email" class="form-control">
                                    <button type="submit"><i class="fa fa-angle-right"></i></button>
                                </fieldset>
                            </form>
                        </div><!-- F Widget Newsletter of the Page end -->
                        <h4 class="f-widget-heading follow">@lang('app.sc_network')</h4>
                        <!-- Social Network of the Page -->
                        <ul class="list-unstyled social-network social-icon">
                            {{-- <li><a href="#"><i class="fa fa-twitter"></i></a></li> --}}
                            {{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li> --}}
                            {{-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            {{-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> --}}
                            <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                        </ul><!-- Social Network of the Page end -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Footer Holder of the Page end -->				
</footer><!-- footer of the Page end -->