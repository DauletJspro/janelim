<?php 
    $currency = \App\Models\Currency::pvToKzt();
 ?>
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
            <?php $__currentLoopData = $packets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packet): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
                        <!-- links start here -->
                        
                    </div><!-- mt product 3 end here -->
                </div><!-- packet_card end here -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div><!-- tabs slider end here -->
    </div><!-- mt producttabs end here -->
</div>