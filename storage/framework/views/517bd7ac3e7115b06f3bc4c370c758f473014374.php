<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-5">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <a class="fancybox" href="<?php echo e($row->avatar); ?>">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo e($row->avatar); ?>">
                    </a>
                    <h3 class="profile-username text-center"><?php echo e($row->name); ?> <?php echo e($row->last_name); ?> <?php echo e($row->middle_name); ?></h3>
                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Активация</b> <a class="pull-right"><?php if($row->is_activated == 0): ?> <span style="color: red">Не пройдено</span><?php else: ?> <span style="color: #009551">Пройдено</span> <?php endif; ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Верификация</b> <a class="pull-right"><?php if($row->is_valid_document == 0): ?> <span style="color: red">Не пройдено</span><?php else: ?> <span style="color: #009551">Пройдено</span> <?php endif; ?></a>
                        </li>

                        <?php if(Auth::user()->role_id == 1): ?>
                            <li class="list-group-item" style="text-align: center">
                                <?php if($row->user_id != Auth::user()->user_id): ?>

                                    <a target="_blank" style="font-weight: bold; text-decoration: underline" href="/admin/document/<?php echo e($row->user_id); ?>">Список документов</a>

                                <?php else: ?>

                                    <a target="_blank" style="font-weight: bold; text-decoration: underline" href="/admin/document/<?php echo e($row->user_id); ?>">Список документов</a>

                                <?php endif; ?>

                            </li>
                        <?php endif; ?>

                        <?php if($row->is_activated == 0 && Auth::user()->role_id == 1): ?>

                            <li class="list-group-item" style="text-align: center">
                                <form action="/admin/profile/activate" method="POST">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="hidden" value="<?php echo e($row->user_id); ?>" name="user_id"/>
                                    <div >
                                        <button type="submit" class="btn btn-primary">Активировать</button>
                                    </div>
                                </form>
                            </li>
                        <?php endif; ?>

                        <li class="list-group-item">
                            <b>Ваш номер</b> <a class="pull-right"><?php echo e($row->user_id); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Дата регистрации</b> <a class="pull-right"><?php echo e($row->date); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Спонсор</b> <a class="pull-right" <?php if(Auth::user()->role_id == 1): ?> href="/admin/profile/<?php echo e($row->recommend_user_id); ?>" target="_blank" <?php endif; ?>><?php echo e($row->recommend_name); ?> <?php echo e($row->recommend_last_name); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Статус</b> <a class="pull-right"><?php echo e($row->user_status_name); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Логин</b> <a class="pull-right"><?php echo e($row->login); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Instagram</b> <a target="_blank" class="pull-right" href="http://instagram.com/<?php echo e($row->instagram); ?>"><?php echo e($row->instagram); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Электронная почта</b> <a class="pull-right"><?php echo e($row->email); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Телефон</b> <a class="pull-right"><?php echo e($row->phone); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>ИИН</b> <a class="pull-right"><?php echo e($row->iin); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Номер карточки</b> <a class="pull-right"><?php echo e($row->card_number); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Название банка</b> <a class="pull-right"><?php echo e($row->bank_name); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>IBAN</b> <a class="pull-right"><?php echo e($row->iban); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Страна</b> <a class="pull-right"><?php echo e($row->country_name_ru); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Город</b> <a class="pull-right"><?php echo e($row->city_name_ru); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Адрес</b> <a class="pull-right"><?php echo e($row->address); ?></a>
                        </li>
                        
                        <li class="list-group-item">
                            <b>Удостоверение личности</b> <a class="pull-right"><?php echo e($row->document_number); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Пол</b> <a class="pull-right"><?php if($row->is_male == 1): ?> Мужской <?php else: ?> Женский <?php endif; ?></a>
                        </li>
                        
                    </ul>

                    <?php if(isset($is_own)): ?>
                        <a href="/admin/profile/edit" class="btn btn-primary btn-block"><b>Редактировать данные</b></a>
                    <?php endif; ?>

                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->


        <div class="col-md-7">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li <?php if(!isset($_GET['tab'])): ?> class="active" <?php endif; ?>><a style="font-size: 13px"  href="#packet_list" data-toggle="tab">Пакеты</a></li>

                    <?php if(Auth::user()->user_id != $row->user_id): ?>
                        <li <?php if(isset($_GET['tab']) && $_GET['tab'] == 'password'): ?> class="active" <?php endif; ?>><a style="font-size: 13px"  href="#password" data-toggle="tab">Изменить пароль</a></li>
                    <?php endif; ?>


                    <?php if(Auth::user()->role_id == 1): ?>
                        <li <?php if(isset($_GET['tab']) && $_GET['tab'] == 'money'): ?> class="active" <?php endif; ?>>
                            <a style="font-size: 13px"  href="#money" data-toggle="tab">Изменить баланс</a>
                        </li>
                        <li <?php if(isset($_GET['tab']) && $_GET['tab'] == 'status'): ?> class="active" <?php endif; ?>>
                            <a style="font-size: 13px"  href="#status" data-toggle="tab">Изменить статус</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content" style="min-height: 400px">


                    <div class="<?php if(!isset($_GET['tab'])): ?> active <?php endif; ?> tab-pane" id="packet_list">
                        <?php echo $__env->make('admin.profile.user_packet_list_loop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>

                    <?php if(Auth::user()->role_id == 1): ?>
                        <div class="<?php if(isset($_GET['tab']) && $_GET['tab'] == 'password'): ?> active <?php endif; ?> tab-pane" id="password">
                            <?php echo $__env->make('admin.profile.password-edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="<?php if(isset($_GET['tab']) && $_GET['tab'] == 'money'): ?> active <?php endif; ?> tab-pane" id="money">
                            <?php echo $__env->make('admin.profile.money-edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="<?php if(isset($_GET['tab']) && $_GET['tab'] == 'status'): ?> active <?php endif; ?> tab-pane" id="status">
                            <?php echo $__env->make('admin.profile.status-edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="<?php if(isset($_GET['tab']) && $_GET['tab'] == 'profit'): ?> active <?php endif; ?> tab-pane" id="volume">
                            <?php echo $__env->make('admin.profile.volume-edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>


    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>