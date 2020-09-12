<?php
$currency = \App\Models\Currency::pvToKzt();
$userPacket = \App\Models\UserPacket::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->user_id])->first();
?>
<?php $__currentLoopData = $packets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packet): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class="card col col-sm-6 col-md-4 col-xl-3 col-xs-12">
        <div class="card-body" style="position:relative;background-color:<?php echo e('#' . $packet->packet_css_color); ?>">
            <h2 class="card-title"><?php echo e($packet->packet_name_ru); ?></h2>
            <h3 style="font-weight: bold;"><?php echo e($packet->packet_price - \App\Models\UserPacket::userHasPacketsPrice($packet->packet_id)); ?> pv
                &emsp;
                <?php echo e(($packet->packet_price - \App\Models\UserPacket::userHasPacketsPrice($packet->packet_id)) * $currency); ?>

                &#8376;</h3>
            <p class="card-text">
                <?php echo e($packet->packet_thing); ?>

            </p>
            <div id="bag-icon">
                <i class="ion ion-bag"></i>
            </div>
            <div class="card-body text-center" style="padding: 1px;">
                <?php if(\App\Models\UserPacket::hasPacket($packet->packet_id)): ?>
                    <?php if(\App\Models\UserPacket::isActive($packet->packet_id)): ?>
                        <a class="small-box-footer shop_buy_btn" style="font-size: 18px">Вы уже приобрели</a>
                    <?php else: ?>
                        <a style="padding: 1px;" href="javascript:void(0)"
                           onclick="cancelResponsePacket(this,'<?php echo e($packet->packet_id); ?>')"
                           class="btn transparent shop_buy_btn">Отменить запрос <i
                                    class="fa fa-arrow-right"></i></a>
                    <?php endif; ?>
                <?php else: ?>

                    <a href="javascript:void(0)" onclick="showBuyModal(this,'<?php echo e($packet->packet_id); ?>')"
                       class="buy_btn_<?php echo e($packet->packet_id); ?> shop_buy_btn btn  transparent">Купить пакет <i
                                class="fa fa-arrow-right"></i></a>

                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


<style>
    .card {
        padding: 15px;
    }

    .card-title {
        font-family: "Consolas", "Monaco", "Bitstream Vera Sans Mono", "Courier New", Courier, monospace;
        font-weight: bold;
    }

    .card-body {
        font-weight: bold;
        border: 1px solid #000000;
        border-radius: 4px;
        padding: 10px;
    }

    .card-body a {
        width: 100%;
        height: 100%;
        font-weight: bold;
        font-size: 2rem;
        color: white;
    }

    .card-text {
        border: 1px solid white;
        border-radius: 4px;
        padding: 5px;
        padding-left: 3px;
        color: white;
        font-size: 1.5rem;
        font-weight: bolder;
        font-family: "Consolas", "Monaco", "Bitstream Vera Sans Mono", "Courier New", Courier, monospace;
    }

    #bag-icon {
        position: absolute;
        right: 3rem;
        top: 25px;
    }

    #bag-icon i {
        font-weight: bold;
        font-size: 4rem;
        color: white;

    }
</style>
