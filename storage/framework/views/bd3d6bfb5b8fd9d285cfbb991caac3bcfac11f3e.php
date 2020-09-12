<?php

use \App\Models\Currency;

?>


<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">


                <div class="box-body">
                    <div class="box-header">
                        <h1 class="box-title main-title">
                            <?php echo e($title); ?>

                        </h1>
                    </div>
                    <div class="nav-tabs-custom">

                        <div class="tab-content">
                            <div>
                                <form class="submit_form">
                                    <table id="news_datatable" class="table table-bordered table-striped table-css">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">№</th>
                                            <th>Пользователь</th>
                                            <th>Отправитель</th>
                                            <th style="width: 150px">Тип операция</th>
                                            <th style="width: 100px">Операция</th>
                                            <th>Количество</th>
                                            <th>Комментарий</th>
                                            <th>Дата</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <tr style="background-color: #ebebeb">
                                            <td></td>
                                            <td><input value="<?php echo e($request->recipient_name); ?>" type="text"
                                                       class="form-control" name="recipient_name" placeholder="Поиск">
                                            </td>
                                            <td><input value="<?php echo e($request->user_name); ?>" type="text" class="form-control"
                                                       name="user_name" placeholder="Поиск"></td>
                                            <td><input value="<?php echo e($request->operation_type); ?>" type="text"
                                                       class="form-control" name="operation_type" placeholder="Поиск">
                                            </td>
                                            <td><input value="<?php echo e($request->operation); ?>" type="text" class="form-control"
                                                       name="operation" placeholder="Поиск"></td>
                                            <td colspan="3" style="text-align: center">
                                                от <input style="width: 35%; display: inline-block"
                                                          value="<?php echo e($request->date_from); ?>" type="text"
                                                          class="form-control datetimepicker-input date-submit"
                                                          name="date_from" placeholder="Дата">
                                                - до <input style="width: 35%; display: inline-block"
                                                            value="<?php echo e($request->date_to); ?>" type="text"
                                                            class="form-control datetimepicker-input date-submit"
                                                            name="date_to" placeholder="Дата">
                                                <input type="submit" value="ОК" style="padding: 5px 7px">
                                            </td>
                                        </tr>
                                        <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                            <tr <?php if($val->operation_type_id == 10): ?> style="background-color: #91ff91 !important;" <?php endif; ?>>
                                                <td> <?php echo e($key + 1); ?></td>
                                                <td class="arial-font">
                                                    <a class="main-label"
                                                       <?php if(Auth::user()->role_id == 1): ?> href="/admin/profile/<?php echo e($val->recipient_id); ?>"
                                                       target="_blank" <?php endif; ?>><p
                                                                class="login"><?php echo e($val->recipient_login); ?></p>
                                                        <p class="client-name"><?php echo e($val->recipient_name); ?> <?php echo e($val->recipient_last_name); ?> <?php echo e($val->recipient_middle_name); ?></p>
                                                    </a>
                                                </td>
                                                <td class="arial-font">
                                                    <a class="main-label"
                                                       <?php if(Auth::user()->role_id == 1): ?> href="/admin/profile/<?php echo e($val->user_id); ?>"
                                                       target="_blank" <?php endif; ?>><p class="login"><?php echo e($val->login); ?></p>
                                                        <p class="client-name"><?php echo e($val->name); ?> <?php echo e($val->last_name); ?> <?php echo e($val->middle_name); ?></p>
                                                    </a>
                                                </td>
                                                <td class="arial-font">
                                                    <?php echo e($val->operation_type_name_ru); ?> <?php if($val->operation_type_id == 9): ?>
                                                        "<?php echo e($val->fond_name_ru); ?>" <?php endif; ?>
                                                </td>
                                                <td class="arial-font">
                                                    <?php echo e($val->operation_name_ru); ?>

                                                </td>
                                                <td class="arial-font">
                                                    <?php if($val->operation_type_id == 2): ?>
                                                        <?php echo e($val->money); ?> доля
                                                    <?php elseif($val->operation_type_id == 11): ?>
                                                        <?php echo e($val->gv_balance); ?> gv
                                                        (<?php echo e(round($val->gv_balance * \App\Models\Currency::GVtoKzt,2)); ?> тг)
                                                    <?php elseif($val->operation_type_id == 30): ?>
                                                        <?php echo e(round($val->money,2)); ?> pv
                                                    <?php else: ?>
                                                        <?php echo e(round($val->money,2)); ?> $
                                                        (<?php echo e(round($val->money * Currency::DollarToKzt,2)); ?>

                                                        тг)
                                                    <?php endif; ?>
                                                </td>
                                                <td class="arial-font">
                                                    <?php echo e($val->operation_comment); ?>

                                                </td>
                                                <td class="arial-font">
                                                    <?php echo e($val->date); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        <tr>
                                            <td colspan="5" style="text-align: right"><b>Общая сумма:</b></td>
                                            <td colspan="1"><b><?php echo e(round($row_sum,2)); ?> $
                                                    (<?php echo e(round($row_sum * Currency::DollarToKzt,2)); ?>

                                                    тг)</b></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        </tbody>

                                    </table>
                                </form>
                            </div>

                        </div>
                    </div>


                    <div style="text-align: center">
                        <?php echo e($row->appends(\Illuminate\Support\Facades\Input::except('page'))->links()); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>