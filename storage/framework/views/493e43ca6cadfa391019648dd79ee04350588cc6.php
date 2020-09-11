<div class="col-xs-12">
    <!-- mt producttabs style2 start here -->
    <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.6s">
        <!-- producttabs start here -->
        <div class="producttabs">
            <p class="producttabs_title">
                <?php echo app('translator')->get('app.company_products'); ?>
            </p>
        </div>
        <!-- producttabs end here -->
        <!-- tabs slider start here -->
        <div class="tabs-sliderlg">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php 
                    $rating_avg = \App\Models\Review::ratingCalculator($product->product_id, \App\Models\Review::PRODUCT_REVIEW)
                 ?>
                <!-- product_card start here -->
                <div class="product_card">
                    <!-- mt product start here -->
                    <div class="product-3">
                        <!-- img start here -->
                        <div class="img">
                            <img alt="image description" src="<?php echo e($product->product_image); ?>">
                        </div>
                        <!-- txt start here -->
                        <div class="txt">
                            <strong class="title"><?php echo e($product->product_name_ru); ?></strong>
                            <p><?php echo e($product->product_desc_ru); ?></p>
                            <a href="<?php echo e(route('product.detail',$product->product_id, ['id' => $product->product_id])); ?>"
                                data-img = "<?php echo e($product->product_image); ?>"
                                data-name = "<?php echo e($product->product_name_ru); ?>"
                                data-desc = "<?php echo e($product->product_desc_ru); ?>"
                                data-price = "<?php echo e($product->product_price); ?>"
                                data-rating = "<?php echo e(\App\Models\Review::ratingCalculator($product->product_id, \App\Models\Review::PRODUCT_REVIEW)); ?>"
                            ><?php echo app('translator')->get('app.read_more'); ?></a>
                        </div>
                        <!-- links start here -->
                        
                    </div><!-- mt product 3 end here -->
                </div><!-- product_card end here -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div><!-- tabs slider end here -->
    </div><!-- mt producttabs end here -->
</div>