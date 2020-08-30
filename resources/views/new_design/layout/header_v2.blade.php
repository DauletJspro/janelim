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
                @if(!Auth::check())
                    <!-- mt top lang start from here -->  
                    <div class="mt-top-lang">
                        <a href="/register" class="lang-opener">Тіркелу</a>
                    </div>
                    <!-- mt top lang end from here -->
                    <span class="account"><a href="/login">Кіру</a></span>
                @else                    
                    <span class="account"><a href="/admin/index">Менің кабинетім</a></span>
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
              <li><a class="icon-heart" href="{{ route('favorite.showUserItem') }}"></a></li>
              <li>
                <a class="cart-opener" href="#">
                  <span class="icon-handbag"></span>
                  <span class="num">{{isset($items) ? count($items) : 0}}</span>
                </a>
              </li>
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
                        <a class="" href="/about-us">Компания жайлы</a>											
                    </li>
                    <li class="drop">
                        <a href="#">Өнімдер <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <!-- mt dropmenu start here -->
                        <div class="mt-dropmenu text-left">
                            <!-- mt frame start here -->
                            <div class="mt-frame">
                                <!-- mt f box start here -->
                                <div class="mt-f-box">
                                    <!-- mt col3 start here -->
                                    <div class="mt-col-3">
                                        <div class="sub-dropcont">
                                            <strong class="title"><a href="#" class="mt-subopener">PRODUCTS</a></strong>
                                            <div class="sub-drop">
                                                <ul>
                                                    <li><a href="#">Product Grid View</a></li>
                                                    <li><a href="#">Product List View</a></li>
                                                    <li><a href="#">Product Detail</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="sub-dropcont">
                                            <strong class="title"><a href="#" class="mt-subopener">404 Pages</a></strong>
                                            <div class="sub-drop">
                                                <ul>
                                                    <li><a href="#">404 Page</a></li>
                                                    <li><a href="#">404 Page2</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mt col3 end here -->

                                    <!-- mt col3 start here -->
                                    <div class="mt-col-3">
                                        <div class="sub-dropcont">
                                            <strong class="title"><a href="#" class="mt-subopener">About US</a></strong>
                                            <div class="sub-drop">
                                                <ul>
                                                    <li><a href="#">About</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="sub-dropcont">
                                            <strong class="title"><a href="#" class="mt-subopener">Contact US</a></strong>
                                            <div class="sub-drop">
                                                <ul>
                                                    <li><a href="#">Contact</a></li>
                                                    <li><a href="#">Contact 2</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="sub-dropcont">
                                            <strong class="title"><a href="#" class="mt-subopener">Coming Soon</a></strong>
                                            <div class="sub-drop">
                                                <ul>
                                                    <li><a href="#">Coming Soon</a></li>
                                                    <li><a href="#">Coming Soon2</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mt col3 end here -->

                                    <!-- mt col3 start here -->
                                    <div class="mt-col-3">
                                        <div class="sub-dropcont">
                                            <strong class="title"><a href="#" class="mt-subopener">KITCHEN FURNITURE</a></strong>
                                            <div class="sub-drop">
                                                <ul>
                                                    <li><a href="#">Kitchen Taps</a></li>
                                                    <li><a href="#">Breakfast time</a></li>
                                                    <li><a href="#">Cooking</a></li>
                                                    <li><a href="#">Food Storage Boxes</a></li>
                                                    <li><a href="#">Spice Jars</a></li>
                                                    <li><a href="#">Napskins</a></li>
                                                    <li><a href="#">Oven Gloves</a></li>
                                                    <li><a href="#">Placemats</a></li>
                                                    <li><a href="#">Cooking</a></li>
                                                    <li><a href="#">Food Storage Boxes</a></li>
                                                    <li><a href="#">Spice Jars</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mt col3 end here -->

                                    <!-- mt col3 start here -->
                                    <div class="mt-col-3 promo">
                                        <div class="mt-promobox">
                                            <a href="#"><img src="http://placehold.it/295x320" alt="promo banner" class="img-responsive"></a>
                                        </div>
                                    </div>
                                    <!-- mt col3 end here -->
                                </div>
                                <!-- mt f box end here -->
                            </div>
                            <!-- mt frame end here -->
                        </div>
                        <!-- mt dropmenu end here -->
                        <span class="mt-mdropover"></span>
                    </li>
                    <li>
                        <a class="" href="{{ route('opportunity') }}">Мүмкіндіктер</a>
                    </li>
                    <li>
                        <a class="" href="#">Байланыс</a>
                    </li>
                </ul>
            </nav><!-- navigation end here -->
          </div><!-- mt bottom bar end here -->
        </div>
      </div>
    </div>
    <span class="mt-side-over"></span>
</header><!-- mt -header style14 end here -->