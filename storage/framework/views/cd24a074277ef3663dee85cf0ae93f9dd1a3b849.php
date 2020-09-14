<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title box-title-first">
            <a class="menu-tab active-page">Запросы на пакет</a>
          </h3>
          <div class="clear-float"></div>
        </div>

        <div class="box-body">

          <table id="news_datatable" class="table table-bordered table-striped table-css">
            <thead>
              <tr style="border: 1px">
                <th style="width: 30px">№</th>
                <th style="width: 100px">Аватар</th>
                <th>Партнер</th>
                <th>Спонсор</th>
                <th>Пакет</th>
                <th>Подарок</th>
                <th style="width: 120px">Дата</th>
                  <th style="width: 120px">Дата</th>
              </tr>
            </thead>

            <tbody>

            <tr>
                <td></td>
                <td></td>
                <td><form><input value="<?php echo e($request->user_name); ?>" type="text" class="form-control" name="user_name" placeholder="Поиск">  </form></td>
                <td><form><input value="<?php echo e($request->sponsor_name); ?>" type="text" class="form-control" name="sponsor_name" placeholder="Поиск"> </form></td>
                <td><form><input value="<?php echo e($request->packet_name); ?>" type="text" class="form-control" name="packet_name" placeholder="Поиск"> </form></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

                  <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                     <tr>
                        <td> <?php echo e($key + 1); ?></td>
                         <td>
                             <div class="object-image client-image">
                                 <a href="/admin/profile/<?php echo e($val->user_id); ?>" target="_blank">
                                     <img src="<?php echo e($val->avatar); ?>">
                                 </a>
                             </div>
                             <div class="clear-float"></div>
                         </td>
                         <td class="arial-font">
                             <a class="main-label" href="/admin/profile/<?php echo e($val->user_id); ?>" target="_blank"><p class="login"><?php echo e($val->login); ?></p><?php if(Auth::user()->user_id == 1): ?><p class="client-name"><?php echo e($val->name); ?> <?php echo e($val->last_name); ?> <?php echo e($val->middle_name); ?></p><?php endif; ?></a>
                         </td>
                         <td class="arial-font">
                             <a class="main-label" href="/admin/profile/<?php echo e($val->recommend_id); ?>" target="_blank"><p class="login"><?php echo e($val->recommend_login); ?></p><?php if(Auth::user()->user_id == 1): ?><p class="client-name"><?php echo e($val->recommend_name); ?> <?php echo e($val->recommend_last_name); ?> <?php echo e($val->recommend_middle_name); ?></p><?php endif; ?></a>
                         </td>
                         <td>
                             <span class="label" style="font-size:15px; padding:2px 10px; background-color: #<?php echo e($val['packet_css_color']); ?>"><?php echo e($val['packet_name_ru']); ?></span>
                         </td>
                         <td>
                             <?php if($val->user_packet_type == 'share'): ?>
                                 Доля
                             <?php elseif($val->user_packet_type == 'item'): ?>
                                 <?php echo e($val->packet_item); ?>

                             <?php elseif($val->user_packet_type == 'service'): ?>
                                 <?php echo e($val->packet_service); ?>

                             <?php endif; ?>
                         </td>
                        <td>
                            <?php echo e($val->date); ?>

                        </td>
                         <td style="text-align: center">
                             <?php if($val->is_epay == 0): ?>
                                <button class="btn btn-block btn-success btn-sm" onclick="acceptUserPacket(this,'<?php echo e($val->user_packet_id); ?>')">Принять</button>
                             <?php else: ?>
                                 <button class="btn btn-block btn-success btn-sm">PayBox</button>
                             <?php endif; ?>
                             <button class="btn btn-block btn-error btn-sm" onclick="deleteUserPacket(this,'<?php echo e($val->user_packet_id); ?>')" style="background-color: rgb(255, 88, 83);">Удалить</button>
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