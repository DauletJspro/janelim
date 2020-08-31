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
<!-- mt header style7 start here -->
<header id="mt-header" class="style7">
    <!-- mt-top-bar start here -->
    <div class="mt-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 hidden-xs">
                    <span class="tel active" onclick="tel:+77019150511"> <i class="fa fa-phone" aria-hidden="true"></i> +7 (701) 915 05 11</span>
                    <a class="tel" href="mailto:janelim.kz@gmail.com"> <i class="fa fa-envelope-o" aria-hidden="true"></i> janelim.kz@gmail.com</a>
                </div>
                <div class="col-xs-12 col-sm-6 text-right">
                    <!-- mt-top-list start here -->
                    <ul class="mt-top-list">
                        <?php if(!Auth::check()): ?>                            
                            <li><a href="/register">Тіркелу</a></li>
                            <li class="active"><a href="/login">Кіру</a></li>                            
                        <?php else: ?>
                            <li class="active"><a href="/admin/index">Менің кабинетім</a></li>                            
                        <?php endif; ?>                                                
                    </ul><!-- mt-top-list end here -->
                </div>
            </div>
        </div>
    </div><!-- mt-top-bar end here -->
    <!-- mt-bottom-bar start here -->
    <div class="mt-bottom-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mt-logo"><a href="/"><img src="/custom2/img/logo/Logo-1.png" alt="schon"></a></div>
                    <?php $totalPrice = 0;?>
                    <?php $total = 0;?>
                    <?php if(Auth::user()): ?>
                        <?php $items = \App\Models\UserBasket::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->user_id])->get(); ?>
                        <?php foreach ($items as $item): ?>
                        <?php $total = (\App\Models\Product::where(['product_id' => $item->product_id])->first()); ?>
                        <?php $totalPrice += $total ? $total->product_price : 0; ?>
                        <?php endforeach ?>
                    <?php endif; ?>
                    <!-- mt-icon-list start here -->
                    <ul class="mt-icon-list">
                        
                        <li>
                            <a href="<?php echo e(route('favorite.showUserItem')); ?>" class="icon-heart">											
                                <span style="margin-bottom: -3px;" class="num"><?php echo e(count($favorites)); ?></span></a>
                        </li>									
                        <li>
                            <a href="<?php echo e(route('basket.show')); ?>" class="icon-handbag">											
                                <span class="num"><?php echo e(isset($items) ? count($items) : 0); ?></span>
                            </a>									
                        </li>
                        <li class="hidden-lg hidden-md">
                            <a class="bar-opener mobile-toggle" href="#">
                                <span class="bar"></span>
                                <span class="bar small"></span>
                                <span class="bar"></span>
                            </a>
                        </li>
                    </ul><!-- mt-icon-list end here -->								
                    <!-- navigation start here -->
                    <nav id="nav">
                        <ul>
                            <li>
                                <a class="" href="/about-us">Компания жайлы</a>											
                            </li>
                            <li>
                                <a class="drop-link" href="#">Өнімдер <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>
                                <div class="s-drop open">
                                    <ul>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <li><a href="<?php echo e(route('product.detail',$product->product_id, ['id' => $product->product_id])); ?>"><?php echo e($product->product_name_ru); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="" href="<?php echo e(route('opportunity')); ?>">Мүмкіндіктер</a>
                            </li>
                            <li>
                                <a class="" href="<?php echo e(route('contact.show')); ?>">Байланыс</a>
                            </li>
                        </ul>
                    </nav><!-- navigation end here -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- mt main start here -->