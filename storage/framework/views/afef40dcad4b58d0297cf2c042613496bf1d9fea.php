<?php $__currentLoopData = $row->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div style="padding: 10px">
                <a href="<?php echo e($item->product_image); ?>" class="fancybox" rel="<?php echo e($key); ?>">
                    <img style="width: 100%; border-radius: 5px" src="<?php echo e($item->product_image); ?>"/>
                </a>
            </div>
            <div class="info-box-content" style="margin-left: 0px; text-align: center; padding-bottom: 14px">
                <span class="info-box-text" style="font-weight: bold; color: red"><?php echo e($item->product_name_ru); ?></span>
                <span class="info-box-number"><?php echo e($item->product_price); ?>PV (<?php echo e(round($item->product_price * \App\Models\Currency::pvToKzt(),2)); ?>тг)</span>
                <a style="text-decoration: underline" href="javascript:void(0)" onclick="getReadMoreProduct(this)">Подробнее</a>
                <span class="info-box-desc" style="display: none"><?php echo e($item->product_desc_ru); ?></span>
                <div class="text-center" style="margin-top: 5px">
                    <input onclick="addProductToBasket('<?php echo e($item->product_id); ?>')"
                           style="border:none; background-color: #00BDE7; border-radius: 5px; padding: 4px 10px"
                           type="button" value="Добавить в корзину"/>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


