<?php $__env->startSection('meta-tags'); ?>

    <title>JanElim.kz</title>
    <meta name="description"
          content="JanElim - это проект предлагающий уникальную натуральную продукцию с широкими бизнес возможностями"/>
    <meta name="keywords" content="JanElim"/>

<?php $__env->stopSection(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>


<?php $__env->startSection('content'); ?>
    <div class="mt-search-popup">
        <div class="mt-holder">
            <a href="#" class="search-close"><span></span><span></span></a>
            <div class="mt-frame">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <span class="icon-microphone"></span>
                    <button class="icon-magnifier" type="submit"></button>
                </form>
            </div>
        </div>
    </div>
    <main id="mt-main">
        <section class="mt-contact-banner"
                 
                 style="background-color: #1b4514" ;
        >
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1 style="color: #fff;" >Регистрация</h1>
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <section class="mt-detail-sec toppadding-zero">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-push-1">
                        <div class="holder" style="margin: 0;">
                            <div class="mt-side-widget">
                                <div style="">
                                    <header class="text-center">
                                        <h1>Регистрация</h1>
                                        <p>Еще нету аккаунта?</p>
                                    </header>
                                    <?php if(isset($error)): ?>
                                        <div class="alert alert-danger">
                                            <p style="color:red"><?php echo e($error); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <form method="post" action="/register">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 form-group">
                                                <input required type="text" name="name" value="<?php echo e($row->name); ?>"
                                                       class="form-control input" placeholder="Имя"/>
                                                <input type="text" name="last_name" value="<?php echo e($row->last_name); ?>"
                                                       class="form-control input" placeholder="Фамилия"/>
                                                <input type="text" name="login" value="<?php echo e($row->login); ?>"
                                                       class="form-control input" placeholder="Логин"/>
                                                <div>
                                                    <select required name="recommend_user_id"
                                                            data-placeholder="Выберите спонсора"
                                                            class="form-control selectpicker input"
                                                            data-live-search="true">
                                                        <option value="">Ваш пригласитель</option>

                                                        <?php if( isset($row->recommend_user_id) || (isset($_GET['id']) && $_GET['id'])): ?>
                                                            <?php  $item = \App\Models\Users::where(['user_id' => (isset($_GET['id']) ? $_GET['id'] : $row->recommend_user_id)])->first(); ?>
                                                            <option selected
                                                                    value="<?php echo e($item->user_id); ?>"> <?php echo e(sprintf('%s (%s)',$item->login, $item->last_name)); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 form-group">
                                                <input required type="email" name="email" class="form-control input"
                                                       value="<?php echo e($row->email); ?>" placeholder="Email"/>
                                                <input required type="tel" name="phone" class="form-control input"
                                                       value="<?php echo e($row->phone); ?>" placeholder="Номер телефона"/>
                                                <input required type="password" value="<?php echo e($row->password); ?>"
                                                       name="password" class="form-control input"
                                                       placeholder="Пароль"/>
                                                <input required type="password" value="<?php echo e($row->confirm_password); ?>"
                                                       name="confirm_password" class="form-control input"
                                                       placeholder="Повторите пароль"/>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-danger btn-type1">Зарегистрироваться
                                        </button>
                                    </form>
                                    <header>
                                        <div class="form-group text-center already-registered-div">
                                            Если Вы уже зарегистрированы на нашем сайте, нажмите <a
                                                    style="font-weight: bold; text-decoration: underline; color: black;"
                                                    href="/login">«Войти»</a>
                                        </div>
                                        <div class="form-group main-page-div" style="text-align: center">
                                            <a style="font-weight: bold; text-decoration: underline; color: black;"
                                               href="/">Главная страница</a>
                                        </div>
                                    </header>
                                    <ul class="mt-socialicons">
                                        <li class="mt-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li style="background-color: lightgreen;"><a href="#"><i
                                                        class="fa fa-whatsapp"></i></a></li>
                                        <li class="mt-youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('design_index.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>