<?php
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

$categories = Category::where(['is_show' => true])->limit(15)->get();
$MAC = exec('getmac');
$MAC = strtok($MAC, ' ');
if (Auth::user()) {
    $favorites = \App\Models\Favorite::where(['user_id' => Auth::user()->user_id])->get();
} else {
    $favorites = \App\Models\Favorite::where(['ip_address' => $MAC])->get();
}
$needSubsidiaryIds = [5, 7, 8];
$subsidiaries = \App\Models\Brand::whereIn('id', $needSubsidiaryIds)->get();

?>
<?php $totalPrice = 0;?>
<?php $total = 0;?>
@if(Auth::user())
    <?php $items = \App\Models\UserBasket::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->user_id])->get(); ?>
    <?php foreach ($items as $item): ?>
    <?php $total = (\App\Models\Product::where(['product_id' => $item->product_id])->first()); ?>
    <?php $totalPrice += $total ? $total->product_price : 0; ?>
    <?php endforeach ?>
@endif
<!-- mt -header style14 start from here -->
<header class="style14" id="mt-header">
    <!-- mt top bar start from here -->
    <div class="mt-top-bar">
      <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 hidden-xs">
                <span class="tel active" onclick="tel:+77019150511"> <i class="fa fa-phone" aria-hidden="true"></i> +7 (701) 915 05 11</span>
            </div>
            <div class="col-xs-12 col-sm-6 text-right">
              <div class="mt-top-lang">
                <a href="#" class="lang-opener" style="font-size: 12px; font-weight: bold;">{{ App::getLocale() }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <div class="drop" style="width: 25px;">
                  <ul>
                    @if (App::isLocale('en'))
                      <li><a href="{{\App\Http\Helpers::setSessionLang('ru',$request)}}">ru</a></li>
                      <li><a href="{{\App\Http\Helpers::setSessionLang('kz',$request)}}">kz</a></li>
                    @elseif (App::isLocale('kz'))
                      <li><a href="{{\App\Http\Helpers::setSessionLang('ru',$request)}}">ru</a></li>
                      <li><a href="{{\App\Http\Helpers::setSessionLang('en',$request)}}">en</a></li>
                    @else
                      <li><a href="{{\App\Http\Helpers::setSessionLang('kz',$request)}}">kz</a></li>
                      <li><a href="{{\App\Http\Helpers::setSessionLang('en',$request)}}">en</a></li>
                    @endif
                  </ul>
                </div>
              </div>
              @if(!Auth::check())
                  <!-- mt top lang start from here -->  
                  <div class="mt-top-lang">
                      <a href="/register" class="lang-opener"> @lang('app.sign_up')</a>
                  </div>
                  <!-- mt top lang end from here -->
                  <span class="account"><a href="/login">@lang('app.sign_in')</a></span>
              @else                    
                  <span class="account"><a href="/admin/index"> @lang("app.cabinet")</a></span>
              @endif              
            </div>
        </div>
      </div>
    </div><!-- mt top bar end here -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <!-- mt bottom bar start from here -->
          <div class="mt-bottom-bar">
            <!-- mt logo start from here -->
            <div class="mt-logo"><a href="/"><img alt="schon" src="/custom2/img/logo/Logo-1.png"></a></div>
            <!-- mt icon list start from here -->
            <ul class="mt-icon-list">
              {{-- <li><a class="icon-magnifier" href="#"></a></li> --}}
              {{-- <li><a class="icon-heart" href="{{ route('favorite.showUserItem') }}"></a></li>
              <li>
                <a class="cart-opener" href="#">
                  <span class="icon-handbag"></span>
                  <span class="num">{{isset($items) ? count($items) : 0}}</span>
                </a>
              </li> --}}
              <li class="hidden-md hidden-lg">
                <a href="#" class="bar-opener big mobile-toggle">
                  <span class="bar"></span>
                  <span class="bar small"></span>
                  <span class="bar"></span>
                </a>
              </li>
            </ul><!-- mt icon list end here -->
            <!-- navigation start here -->
            <nav id="nav" style="float: unset;">
                <ul>
                    <li>
                        <a class="" href="/about-us">@lang('app.about_us')</a>
                    </li>
                    <li>
                        <a class="drop-link" href="#">@lang('app.products') <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>
                        <div class="s-drop open">
                            <ul>
                                @foreach ($products as $product)
                                    <li><a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name_ru}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="" href="/opportunity">@lang('app.opportunities')</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('contact.show') }}">@lang('app.contact')</a>
                    </li>
                </ul>
            </nav><!-- navigation end here -->
          </div><!-- mt bottom bar end here -->
        </div>
      </div>
    </div>
    <span class="mt-side-over"></span>
</header><!-- mt -header style14 end here -->