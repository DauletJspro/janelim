<?php $__env->startSection('css'); ?>

    <link rel="stylesheet" type="text/css" href="/custom/css/structure/reset.css">
    <link rel="stylesheet" type="text/css" href="/custom/css/structure/style_002.css">
    <link rel="stylesheet" type="text/css" href="/custom/css/structure/others.css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="main-content">
                <div class="heading-with-button">
                    <h1 class="with-subtitle">Мое структурное дерево<span class="subtitle">В этом разделе вы можете контролировать своё структурное дерево.</span>
                    </h1>
                </div>

                

                <div class="panel binar-info">
                    <div class="header-container">
                        <div class="binar-info-container binar-info-top">
                            <span class="cell bgWhite bgSquare"></span>
                            <span class="text">Лично приглашенные</span>
                        </div>
                        <div class="binar-info-container binar-info-top">
                            <span class="cell bgWhite"></span>
                            <span class="text">Не лично приглашенные</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <hr>
                    <div class="binar-info-container">
                        <span class="cell bgNew"></span>
                        <span class="text">Ожидание оплаты</span>
                    </div>
                    <div class="binar-info-container">
                        <span class="cell bgOk"></span>
                        <span class="text">Активный партнер</span>
                    </div>
                    <div class="binar-info-container">
                        <span class="cell red-square"></span>
                        <span class="text">Неактивный партнер</span>
                    </div>
                    <div class="binar-info-container">
                        <span class="cell bgOk"></span>
                        <span class="text">Клиент</span>
                    </div>
                    <div class="binar-info-container">
                        <span class="cell orange-square"></span>
                        <span class="text">Агент</span>
                    </div>
                    <div class="binar-info-container">
                        <span class="cell blue-square"></span>
                        <span class="text">Менеджер</span>
                    </div>
                    <div class="binar-info-container">
                        <span class="cell pink-square"></span>
                        <span class="text">Другой статус</span>
                    </div>
                    <div class="binar-info-container">
                        <span class="cell bgBlocked"></span>
                        <span class="text">Заблокирован</span>
                    </div>
                    <div class="binar-info-container">
                        <span class="cell bgWhite"></span>
                        <span class="text">Пустая ячейка</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="structure-content">
                    <div class="binary-structure full-width" style="width: auto; height: auto;">

                        <?php $user = \App\Models\Users::where('user_id',Auth::user()->user_id)->first();
                              $main_user_id = Auth::user()->user_id;
                        ?>

                        <div class="first-user">
                            <?php echo view('admin.binar-structure.user-info',['user' => $user,'first_user' => 1, 'main_user_id' => Auth::user()->user_id]); ?>

                        </div>

                        <?php $count = 1; ?>

                        <?php echo view('admin.binar-structure.divide-line',['count' => $count, 'parent' => $user, 'first_user' => 1, 'main_user_id' => $main_user_id]); ?>


                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>