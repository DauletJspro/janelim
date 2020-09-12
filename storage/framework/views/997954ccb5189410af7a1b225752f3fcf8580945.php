<?php $__currentLoopData = $row->packet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box" style="background-color: #<?php echo e($item->packet_css_color); ?>">
            <div class="inner">
                <h3 style="font-family: cursive; font-size: 24px"><?php echo e($item->packet_name_ru); ?></h3>
                <h4 style="font-size: 22px"><?php echo e($item->packet_price); ?> PV</h4>
            </div>
            <div class="icon">
                <i class="ion ion-bag" style="font-size: 17px"></i>
            </div>

                <?php if($item->is_active > 0): ?>
                    <a class="small-box-footer" style="font-size: 18px">Приобретенный</a>
                <?php else: ?>
                    <a class="small-box-footer" style="font-size: 18px">Отправил запрос</a>
                <?php endif; ?>

        </div>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>