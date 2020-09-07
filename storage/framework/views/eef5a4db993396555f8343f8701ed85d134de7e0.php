<?php $__env->startSection('content'); ?>

        <section class="content-header">
            <h1>
              <?php echo e($title); ?>

            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                   <div class="col-md-8" style="padding-left: 0px">
                       <div class="box box-primary">
                           <?php if(isset($error)): ?>
                               <div class="alert alert-danger">
                                   <?php echo e($error); ?>

                               </div>
                           <?php endif; ?>
                               <form action="/admin/packet-item/<?php echo e($row->packet_id); ?>" method="POST">
                                   <input type="hidden" name="_method" value="PUT">
                                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                   <input type="hidden" name="packet_id" value="<?php echo e($row->packet_id); ?>">
                                   <input type="hidden" value="<?php echo e($row->packet_image); ?>" name="packet_image" class="image-name">

                                   <div class="box-body">
                                       <div class="form-group">
                                           <label>Название (Рус)</label>
                                           <input value="<?php echo e($row->packet_name_ru); ?>" type="text" class="form-control" name="packet_name_ru" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Доля</label>
                                           <input value="<?php echo e($row->packet_share); ?>" type="text" class="form-control" name="packet_share" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Услуга</label>
                                           <input value="<?php echo e($row->packet_lection); ?>" type="text" class="form-control" name="packet_lection" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Товар</label>
                                           <input value="<?php echo e($row->packet_thing); ?>" type="text" class="form-control" name="packet_thing" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Порядковый номер сортировки</label>
                                           <input value="<?php echo e($row->sort_num); ?>" type="text" class="form-control" name="sort_num" placeholder="Введите">
                                       </div>
                                   </div>
                                   <div class="box-footer">
                                       <button type="submit" class="btn btn-primary">Сохранить</button>
                                   </div>
                                </form>
                       </div>
                   </div>
                    <div class="col-md-4">
                        <div class="box box-primary" style="padding: 30px; text-align: center">
                            <div style="padding: 20px; border: 1px solid #c2e2f0">
                                <img class="image-src" src="<?php echo e($row->packet_image); ?>" style="width: 100%; "/>
                            </div>
                            <div style="background-color: #c2e2f0;height: 40px;margin: 0 auto;width: 2px;"></div>
                            <form id="image_form" enctype="multipart/form-data" method="post" class="image-form">
                                <i class="fa fa-plus"></i>
                                <input id="avatar-file" type="file" onchange="uploadImage()" name="image"/>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>