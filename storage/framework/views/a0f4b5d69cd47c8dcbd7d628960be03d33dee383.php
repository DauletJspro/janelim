<?php $__env->startSection('breadcrump'); ?>

    <section class="content-header">
        <h1>
            Корзина
        </h1>

        <div style="text-align: right">
            <a style="font-size: 20px;text-decoration: underline;" href="/admin/online">Перейти в магазин<span
                        id="basket_count" class="label label-primary pull-right"
                        style=" background-color: rgb(253, 58, 53) ! important; font-size: 15px; border-radius: 50%"><?php echo e($row->basket_count); ?></span></a>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h2 class="page-header">Корзина</h2>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <?php echo $__env->make('admin.online-shop.basket-list-loop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>

    <div class="modal-dialog" id="shop_modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal()"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title" id="modal_title">Подтвердить заказ</h2>
            </div>
            <div class="modal-body">
                <p><span>Общая сумма: </span><span id="modal_desc"></span></p>
            </div>
            <div class="modal-footer">
                <button style="width: 100%; margin-bottom: 20px" type="button" onclick="closeModal()"
                        class="btn btn-default pull-left">Закрыть
                </button>
                <button onclick="confirmBasket()"
                        style="margin-left:0px; background-color: #6cba5b; width: 100%; margin-bottom: 20px"
                        type="button" class="btn btn-default pull-left">Купить
                </button>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>