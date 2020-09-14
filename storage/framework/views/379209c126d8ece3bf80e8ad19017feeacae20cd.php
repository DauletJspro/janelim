<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title box-title-first">
            <a class="menu-tab active-page">Запросы о снятии денег</a>
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
                <th>ИИН</th>
                <th>Сумма</th>
                <th>Комиссия</th>
                <th style="width: 120px">Дата</th>
                  <th>Коммент</th>
                  <th style="width: 120px"></th>
              </tr>
            </thead>

            <tbody>

            <tr>
                <td></td>
                <td></td>
                <td><form><input value="<?php echo e($request->user_name); ?>" type="text" class="form-control" name="user_name" placeholder="Поиск">  </form></td>
                <td></td>
                <td></td>
                <td></td>
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
                            <p style="margin: 0px"><b>ИИН: </b><?php echo e($val->iin); ?></p>
                            <p style="margin: 0px"><b>БАНК: </b><?php echo e($val->bank_name); ?></p>
                            <p style="margin: 0px"><b>КАРТОЧКА: </b><?php echo e($val->card_number); ?></p>
                         </td>
                         <td>
                             <?php echo e($val->money*0.9); ?> $ (<?php echo e(round($val->money *0.9* \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)
                         </td>
                         <td>
                             <?php echo e($val->money*0.1); ?> $ (<?php echo e(round($val->money *0.1* \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)
                         </td>
                        <td>
                            <?php echo e($val->date); ?>

                        </td>
                         <td>
                             <?php echo e($val->comment); ?>

                         </td>
                         <td style="text-align: center">
                             <button class="btn btn-block btn-success btn-sm" onclick="acceptUserRequest(this,'<?php echo e($val->user_request_id); ?>')">Принять</button>
                             <button class="btn btn-block btn-error btn-sm" onclick="deleteUserRequest(this,'<?php echo e($val->user_request_id); ?>')" style="background-color: rgb(255, 88, 83);">Удалить</button>
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