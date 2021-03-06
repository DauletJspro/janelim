<?php $__env->startSection('content'); ?>

        <section class="content-header">
            <h1>
             Сменить пароль
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-primary">
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger">
                           <?php echo e($error); ?>

                        </div>
                    <?php endif; ?>

                    <div id="error_text" class="alert alert-danger" style="display: none"></div>
                        <form action="/admin/password" method="POST">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                            <div class="box-body">
                                <div class="form-group">
                                    <label>Старый пароль</label>
                                    <input value="" type="password" class="form-control" name="old_password" placeholder="Введите">
                                </div>
                                <div class="form-group">
                                    <label>Новый пароль</label>
                                    <input value="" type="password" class="form-control" name="new_password" placeholder="Введите">
                                </div>
                                <div class="form-group">
                                    <label>Подтвердите пароль</label>
                                    <input value="" type="password" class="form-control" name="confirm_password" placeholder="Введите">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>