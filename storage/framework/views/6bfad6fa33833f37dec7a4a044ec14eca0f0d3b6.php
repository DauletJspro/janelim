<?php $__env->startSection('breadcrump'); ?>
    <section class="content-header">
        <h1>
            Магазин
        </h1>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h2 class="page-header">Новые пакеты (товары) </h2>
        </div>
        <?php echo view('admin.shop.packets_show', [
            'packets' => $packets
        ]); ?>


    </div>


    <div class="modal fade text-center" id="buy_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Купить пакет</h2>
                </div>
                <div class="modal-body">
                    <div class="btn-group">
                        <button style="font-size: 2rem; font-weight: bolder;" class="btn btn-success" type="button" id="send_request_btn">
                            Отправить запрос
                        </button>
                    </div>
                    <hr>
                    <div class="btn-group">
                        <button style="font-size: 2rem; font-weight: bolder;" class="btn btn-warning" type="button" id="buy_packet_from_balance_btn">
                            Снять с баланса
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>