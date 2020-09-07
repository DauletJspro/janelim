<?php

use Illuminate\Support\Facades\URL;


$tab = (explode('tab=', URL::current()));

?>


<?php $__env->startSection('meta-tags'); ?>

    <title>Jan Elim</title>
    <meta name="description"
          content="JanElim - это проект предлагающий уникальную натуральную продукцию с широкими бизнес возможностями"/>
    <meta name="keywords" content="Jan Elim"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $currency = \App\Models\Currency::DollarToKzt;
 ?>
    <main id="mt-main">
        <!-- Mt Product Detial of the Page -->
        <section class="mt-product-detial wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- Slider of the Page -->
                        <div class="slider">
                            <!-- Comment List of the Page -->                            
                            <div class="list-unstyled comment-list" ></div>
                            <!-- Comment List of the Page end -->
                            <!-- Packet Slider of the Page -->
                            <div class="product-slider">
                                <div class="slide">
                                    <div class="slide_image" style="
                                            background-image: url('<?php echo e($packet->packet_image); ?>');">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider of the Page end -->
                        <!-- Detail Holder of the Page -->
                        <div class="detial-holder">
                            <!-- Breadcrumbs of the Page -->
                            <ul class="list-unstyled breadcrumbs">
                                <li><a href="/">Главная <i class="fa fa-angle-right"></i></a></li>
                                <li>Пакеты</li>
                            </ul>
                            <!-- Breadcrumbs of the Page end -->
                            <h2><?php echo e($packet->packet_name_ru); ?></h2>
                            <!-- Rank Rating of the Page -->
                            <div class="rank-rating">                                
                            </div>                            
                            <div class="txt-wrap">
                                <p><?php echo e($packet->packet_desc_ru); ?></p>
                            </div>
                            <div class="text-holder">
                                <span class="price">Цена: &nbsp; $<?php echo e($packet->packet_price); ?> &nbsp; (<?php echo e($packet->packet_price * $currency); ?> &#8376;)</span>
                            </div>
                            <!-- Product Form of the Page -->
                            <?php if(Auth::user() && \App\Models\UserPacket::hasPacket($packet->packet_id)): ?>                            
                                <?php if(\App\Models\UserPacket::isActive($packet->packet_id)): ?>
                                    <a class="product-form">                                                                                
                                        <fieldset>
                                            <div class="row-val">
                                                <button class="submitPacket">Вы уже приобрели</button>
                                            </div>                                            
                                        </fieldset>
                                    </a>                                    
                                <?php else: ?>
                                    <a class="product-form">
                                        <fieldset>
                                            <div class="row-val">
                                                <button class="submitPacket" onclick="cancelResponsePacket(this,'<?php echo e($packet->packet_id); ?>')">Отменить запрос <i class="fa fa-arrow-circle-right"></i></button>
                                            </div>                                            
                                        </fieldset>
                                    </a>                                    
                                <?php endif; ?>
                            <?php else: ?>
                                <a class="product-form" style="float: left;">
                                    <fieldset>
                                        <div class="row-val">
                                            <button class="submitPacket buy_btn_<?php echo e($packet->packet_id); ?>" onclick="showBuyModal(this, '<?php echo e($packet->packet_id); ?>')">Купить пакет <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </fieldset>
                                </a>                                
                            <?php endif; ?>
                        <!-- Product Form of the Page end -->
                        </div>
                        <!-- Detail Holder of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Product Detial of the Page end -->       
        <div class="related-products wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>ДРУГИЕ ПАКЕТЫ</h2>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="tabs-sliderlg">
                                    <?php $__currentLoopData = $relatedPacket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packet): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                                
                                        <!-- packet_card start here -->
                                        <div class="packet_card">
                                            <!-- mt product start here -->
                                            <div class="product-3">
                                                <!-- img start here -->
                                                <div class="img">
                                                    <img alt="image description" src="<?php echo e($packet->packet_image); ?>">
                                                </div>
                                                <!-- txt start here -->
                                                <div class="txt">
                                                    <strong class="title"><?php echo e($packet->packet_name_ru); ?></strong>
                                                    <span class="price"> <?php echo e(($packet->packet_price * $currency)); ?> тг</span>
                                                    <p><?php echo e($packet->packet_desc_ru); ?></p>
                                                    <a href="<?php echo e(route('packet.detail',$packet->packet_id, ['id' => $packet->packet_id])); ?>">Толығырақ</a>
                                                </div>
                                            </div><!-- mt product 3 end here -->
                                        </div><!-- packet_card end here -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <div class="title-group"
                             style="margin-left: 20px; font-size: 120%; color: black; font-weight: 400;">
                            <h4 class="modal-title">Пригласить друга</h4>
                            <h5 class="modal-title">Вы можете поделиться со своими друзьями в социальной сети</h5>
                            <h5 class="modal-title">http://local.qpartners.club/1/admin</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <ul style="list-style: none;">
                            <li>
                                <a href="https://api.whatsapp.com/send?text=<?php echo e($url); ?>" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid lightgreen;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: lightgreen;" class="fa fa-whatsapp"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Whatsapp</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="https://telegram.me/share/url?url=<?php echo e($url); ?>" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="
                                    background-image: url('https://bitnovosti.com/wp-content/uploads/2017/02/telegram-icon-7.png');
                                    background-position: center;
                                    background-size: cover;
                                    width: 18px;height: 18px;
                                    bottom: -5px;
                                    "
                                       class="fa fa-telegram"
                                    >

                                    </i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Telegram</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="https://www.facebook.com/sharer.php?u=<?php echo e($url); ?>" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: dodgerblue;" class="fa fa-facebook"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Facebook</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="http://vk.com/share.php?url=<?php echo e($url); ?>" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: dodgerblue;" class="fa fa-vk"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через VK</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="https://twitter.com/share?url=<?php echo e($url); ?>" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: dodgerblue;" class="fa fa-twitter"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Twiiter</span>
                                </a>

                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php echo $__env->make('new_design.packet._buy_packet_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('new_design.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>