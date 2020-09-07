<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title box-title-first">
            <a class="menu-tab <?php if(!isset($request->active) || $request->active == '1'): ?> active-page <?php endif; ?>">Активные пакеты</a>
          </h3>
          <div class="clear-float"></div>
        </div>
        <div class="box-body">
          <table id="packet_datatable" class="table table-bordered table-striped">
            <thead>
              <tr style="border: 1px">
                <th style="width: 30px">№</th>
                <th></th>
                <th>Название</th>
                <th>Доля</th>
                <th>Услуга</th>
                <th>Товар</th>
                <th style="width: 15px"></th>
              </tr>
            </thead>

            <tbody>

                  <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                     <tr>
                        <td> <?php echo e($key + 1); ?></td>
                         <td>
                             <div class="object-image">
                                 <a class="fancybox" href="<?php echo e($val->packet_image); ?>">
                                     <img src="<?php echo e($val->packet_image); ?>">
                                 </a>
                             </div>
                             <div class="clear-float"></div>
                         </td>
                        <td>
                            <?php echo e($val['packet_name_ru']); ?>

                        </td>
                        <td>
                            <?php echo e($val['packet_share']); ?>

                        </td>
                         <td>
                            <?php echo e($val['packet_lection']); ?>

                        </td>
                         <td>
                            <?php echo e($val['packet_thing']); ?>

                        </td>
                        <td style="text-align: center">
                            <a href="/admin/packet-item/<?php echo e($val->packet_id); ?>/edit">
                                <li class="fa fa-pencil" style="font-size: 20px;"></li>
                            </a>
                        </td>
                     </tr>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </tbody>

          </table>

            <div style="text-align: center">
                <?php echo e($row->appends(\Illuminate\Support\Facades\Input::except('page'))->links()); ?>

            </div>

        </div>
      </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>