<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="clear-float"></div>
                </div>

                <div class="box-body">

                    <div class="col-md-12">
                        <h3 class="box-title box-title-first">
                            <a class="menu-tab ">Отправить на другой аккаунт</a>
                        </h3>
                        <div class="form-group">
                            <label style="font-weight: 400; font-size: 18px">Ваша текущая сумма:
                                <b><?php echo e(Auth::user()->user_money); ?> $</b>
                                <?php echo e(Auth::user()->user_money * (\App\Models\Currency::where(['currency_id'  => \App\Models\Currency::DOLLAR])->first())->money); ?>

                                тг </label>
                            </br>
                        </div>
                        <div class="form-group">
                            <label>Укажите сумму ($)</label>
                            <input id="money" min="0" onchange="changeMoney()" required value="" type="numeric"
                                   class="form-control" name="money" placeholder="Введите">
                        </div>
                        <div class="form-group">
                            <label>Напишите логин получателя</label>
                            <select id="recipient_id" required name="recipient_id" data-placeholder="Выберите спонсора"
                                    class="form-control selectpicker" data-live-search="true">
                                <option value=""></option>
                                <?php $__currentLoopData = $users_row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($item->user_id); ?>"><?php echo e($item['login']); ?>

                                        (<?php echo e($item['last_name']); ?> <?php echo e($item['name']); ?> <?php echo e($item['middle_name']); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Комментарии</label>
                            <textarea class="form-control" id="comment"></textarea>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="sendMoneyToOtherAccount()">Отправить
                                запрос
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>