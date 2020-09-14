<?php $__env->startSection('breadcrump'); ?>

    <section class="content-header">
        <h1>
            Магазин
        </h1>

        <div class="alert alert-warning">
            <h4>* Активный Партнер - это Партнер совершающий покупку продукции не менее 10$ каждый месяц</h4>
            <h4>** Cash Back бонус получает со статуса AGENT и выше</h4>
        </div>

        <div style="text-align: right">
            <a style="font-size: 20px;text-decoration: underline;" href="/admin/basket">Посмотреть корзину <span id="basket_count" class="label label-primary pull-right" style=" background-color: rgb(253, 58, 53) ! important; font-size: 15px; border-radius: 50%"><?php echo e($row->basket_count); ?></span></a>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h2 class="page-header">Список товаров</h2>
        </div>

        <?php echo $__env->make('admin.online-shop.product-list-loop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <div class="text-center">
        <?php echo $row->products->links(); ?>

    </div>

    <div class="modal-dialog" id="shop_modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal()"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title" id="modal_title"></h2>
            </div>
            <div class="modal-body">
                <p id="modal_desc"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onclick="closeModal()">Закрыть</button>
            </div>
        </div><!-- /.modal-content -->
    </div>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>