<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="box-header">
                        <h1 class="box-title main-title">
                            Документы
                        </h1>
                        <div class="clear-float"></div>
                    </div>
                    <div class="nav-tabs-custom">
                        <div class="tab-content" >
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#qaz" data-toggle="tab">Қазақша</a>
                                    </li>
                                    <li>
                                        <a href="#rus" data-toggle="tab">Русский</a>
                                    </li>
                                </ul>
                                <div class="tab-content" style="min-height: 400px">
                                    <div class="active tab-pane" id="qaz">
                                        <?php $__currentLoopData = $document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <a style="font-size: 18px; margin-bottom: 10px" target="_blank" href="<?php echo e($item['doc_pdf_kz']); ?>"><?php echo e($key + 1); ?>. <?php echo e($item['doc_name_kz']); ?></a></br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </div>
                                    <div class="tab-pane" id="rus">
                                        <?php $__currentLoopData = $document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <a style="font-size: 18px; margin-bottom: 10px" target="_blank" href="<?php echo e($item['doc_pdf_ru']); ?>"><?php echo e($key + 1); ?>. <?php echo e($item['doc_name_ru']); ?></a></br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>