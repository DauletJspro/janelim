<?php $__env->startSection('meta-tags'); ?>

    <title>JanElim.kz</title>
    <meta name="description"
          content="JanElim - это проект предлагающий уникальную натуральную продукцию с широкими бизнес возможностями"/>
    <meta name="keywords" content="JanElim"/>

<?php $__env->stopSection(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<?php $__env->startSection('content'); ?>
    <main id="mt-main">
        <section class="mt-contact-banner"
                 style="background-color: lightgrey;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center" >
                        <h1>Войти</h1>
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
                    <div class="col-xs-12 col-sm-8 col-sm-push-2">
                        <div class="holder" style="margin: 0;">
                            <div class="mt-side-widget">
                                <header class="text-center">
                                    <h1 style="margin: 0 0 5px;">Войти</h1>
                                    <p>Добро пожаловать!</p>
                                </header>
                                <?php if(isset($error)): ?>
                                    <div class="alert alert-danger" style="width: 100%;margin-bottom: -30px;">
                                        <div class="">
                                            <p style="color:red;"><?php echo e($error); ?></p>
                                        </div>
                                    </div>
                                <?php elseif(isset($success)): ?>
                                    <div class="alert alert-success" style="width: 100%;margin-bottom: -30px;">
                                        <div class="">
                                            <p style="color:green;"><?php echo e($success); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <form method="post" action="/login">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input required type="text" name="login"
                                       value="<?php if(isset($login)): ?><?php echo e($login); ?><?php endif; ?>" class="form-control input"
                                       placeholder="ID, Email или логин"/>
                                <input required type="password" name="password" class="form-control input"
                                       placeholder="Пароль"/>
                                <br>
                                <br>
                                <button type="submit" class="btn btn-danger btn-type1">Войти</button>
                            </form>
                            <header>
                                <div class="form-group already-registered-div">
                                    Если вы еще не зарегистрированы на нашем сайте, вы можете сделать это
                                    перейдя по
                                    ссылке <a href="/register"
                                              style="font-weight: bold; text-decoration: underline; color: black;">регистрация</a>
                                </div>
                            </header>
                            <div class="footer">
                                <div class="form-group" style="text-align: center">
                                    <div class="col-md-6 main-page-div">
                                       <a style="font-weight: bold; text-decoration: underline; color: black;"
                                           href="/reset-password">Забыли пароль?</a> 
                                    </div>
                                    <div class="col-md-6 main-page-div">
                                        <a style="font-weight: bold; text-decoration: underline; color: black;"
                                           href="/">Главная страница</a>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('design_index.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>