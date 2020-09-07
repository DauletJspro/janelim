<?php

use Illuminate\Support\Facades\Session;

?>


<?php $__env->startSection('meta-tags'); ?>

    <title>Jan Elim</title>
    <meta name="description"
          content="JanElim - это проект предлагающий уникальную натуральную продукцию с широкими бизнес возможностями"/>
    <meta name="keywords" content="Jan Elim"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main id="mt-main" class="mt-main-reload">
        <div class="container">
            <?php if(!Auth::user()): ?>
                <div class="text-center">
                    <p style="font-weight:500; font-size: 120%; padding: 10px; background-color: #fee78e;"><a
                                style="color: blue;" href="/login">Войти</a> ,
                        чтобы сохранить
                        избранные
                        объявления и результаты поиска</p>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 wow fadeInRight" data-wow-delay="0.4s">
                    <!-- mt shoplist header start here -->
                    
                    <!-- mt shoplist header end here -->
                    <!-- mt productlisthold start here -->
                    <ul class="mt-productlisthold list-inline" id="reload-items">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li>
                                <div class="product-3 marginzero">
                                    <div class="img">
                                        <div style="
                                                width: 275px;
                                                height: 290px;
                                                background-position: center;
                                                background-repeat: no-repeat;
                                                background-size: contain;
                                                background-image: url('<?php echo e($product->product_image); ?>');
                                                ">

                                        </div>
                                    </div>
                                    <div class="txt">
                                        <strong class="title"><?php echo e($product->product_name_ru); ?></strong>
                                        <span class="price"><i class="fa fa-dollar"></i> <?php echo e($product->product_price); ?>

                                        &nbsp; <?php echo e($product->product_price * \App\Models\Currency::usdToKzt()); ?> тг
                                    </span>
                                    </div>

                                    <!-- links start here -->
                                    <ul class="links">
                                        <li><a style="cursor: pointer;"
                                               data-item-id="<?php echo e($product->product_id); ?>"
                                               data-method="add"
                                               data-user-id="<?php echo e(Auth::user() ? Auth::user()->user_id : NULL); ?>"
                                               data-route="<?php echo e(route('basket.isAjax')); ?>"
                                               onclick="addItemToBasket(this)"
                                            ><i class="icon-handbag"></i></a></li>
                                        <li><a style="cursor: pointer;"
                                               data-item-id="<?php echo e($product->product_id); ?>"
                                               data-method="add"
                                               data-user-id="<?php echo e(Auth::user() ? Auth::user()->user_id : NULL); ?>"
                                               data-session-id="<?php echo e(Session::getId()); ?>"
                                               data-route="<?php echo e(route('favorite.isAjax')); ?>"
                                               onclick="addItemToFavorites(this)"
                                            ><i style="color: red;" class="fa fa-heart"></i></a></li>
                                        <li>
                                            <a href="<?php echo e(('/product/' . $product->product_id)); ?>">
                                                <i class="icomoon fa fa-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- mt product 3 end here -->
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul><!-- mt productlisthold end here -->
                    <!-- mt pagination start here -->
                    
                    <!-- mt pagination end here -->
                </div>
            </div>
        </div>
        <?php
        $MAC = exec('getmac');
        $MAC = strtok($MAC, ' ');
        $temporaryFavorites = \App\Models\Favorite::where(['ip_address' => $MAC])->where(['is_authorized' => false])->where(['user_id' => false])->get();
        ?>

        <?php if(Auth::user() && count($temporaryFavorites)): ?>
            <a id="newsletter-hiddenlink" href="#popup2" class="lightbox" style="display: none;">NEWSLETTER</a>

            <div id="popup2" class="lightbox">
                <!-- Mt Newsletter Popup of the Page -->
                <section class="mt-newsletter-popup">
                    <div class="mt-drop">
                        <h3>Избранные объявления и результаты поиска в вашем Буфере</h3>
                        <h4>Поскольку вы еще не вошли на сайт, ваши объявления и результаты поиска добавятся в Избранные
                            так:</h4>
                        <div class="mt-drop-sub">
                            <!-- mt side widget start here -->
                            <div class="mt-side-widget">
                                <?php $__currentLoopData = $temporaryFavorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="cart-row">
                                        <a href="#" class="img">
                                            <div style="
                                                    background-image: url('<?php echo e($favorite->product->product_image); ?>');
                                                    background-size: contain;
                                                    background-repeat: no-repeat;
                                                    background-position: center;
                                                    width: 80px;
                                                    height: 80px;
                                                    ">
                                            </div>

                                        </a>
                                        <div class="mt-h">
                                            <span class="mt-h-title"><a
                                                        href="#"><?php echo e($favorite->product->product_name_ru); ?></a></span>
                                            <span class="price"><i class="fa fa-dollar" aria-hidden="true"></i><?php echo e($favorite->product->product_price); ?>

                                            &nbsp; <?php echo e($favorite->product->product_price * \App\Models\Currency::usdToKzt()); ?> тг
                                        </span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <div class="cart-btn-row text-center">
                                    <a
                                            style="cursor: pointer;"
                                            data-method="addAfterAuth"
                                            data-user-id="<?php echo e(Auth::user() ? Auth::user()->user_id : NULL); ?>"
                                            data-route="<?php echo e(route('favorite.isAjax')); ?>"
                                            onclick="addAfterAuthToFavorites(this)"
                                            href="javascript:;"

                                            class="btn-type2 close">Сохранить в Избранные</a>
                                </div>
                                <div class="cart-btn-row text-center">
                                    <a
                                            style="cursor: pointer;"
                                            data-method="cancelItem"
                                            data-user-id="<?php echo e(Auth::user() ? Auth::user()->user_id : NULL); ?>"
                                            data-route="<?php echo e(route('favorite.isAjax')); ?>"
                                            onclick="cancelItemAfterAuth(this)"
                                            href="javascript:;"
                                            class="close" style="font-size: 120% !important; font-weight: 400;color: blue !important;">Нет, спасибо</a>
                                </div>
                            </div>
                            <!-- mt side widget end here -->
                        </div>
                        <!-- mt drop sub end here -->
                    </div>
                </section><!-- Mt Newsletter Popup of the Page -->
            </div>
        <?php endif; ?>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('new_design.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>