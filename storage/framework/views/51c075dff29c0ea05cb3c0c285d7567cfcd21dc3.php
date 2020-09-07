<?php $__env->startSection('meta-tags'); ?>

    <title>Наши контакты.</title>
    <meta name="description"
          content="Наши контакты. Jan Elim - это группа единомышленников, которые уже имеют богатый опыт работы в МЛМ - индустрии, интернет-коммерции и обладают всеми необходимыми качествами для достижения поставленных целей"/>
    <meta name="keywords" content="Наши контакты, Jan Elim"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main id="mt-main">
        <!-- Mt Contact Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
                 style="background-color: lightgrey;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>Контакты</h1>
                        <nav class="breadcrumbs">
                            
                            
                            
                            
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- Mt Contact Banner of the Page -->
        <!-- Mt Contact Detail of the Page -->
        <section class="mt-contact-detail content-info wow fadeInUp" data-wow-delay="0.4s">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <div class="txt-wrap">
                            <h1>Всегда на связи</h1>
                            <p>Всегда готовы ответить на интересующие вопросы и решить Ваши проблемы в самые короткие
                                сроки. Также, с радостью ждем Вас у нас в офисе.</p>
                        </div>
                        <ul class="list-unstyled contact-txt">
                            <li>
                                <strong>Адрес</strong>
                                <address style="line-height: 2.5rem; font-weight: 400;">г. Алматы, пр. Достык, 111/2 <br>                                   
                                </address>
                            </li>
                            <li>
                                <strong>Телефонный номер</strong>
                                <a href="tel: +77019150511" style="line-height: 2.5rem; font-weight: 400;"> +7 (701) 915 05 11</a> <br>
                                <a href="tel: +77079912291" style="line-height: 2.5rem; font-weight: 400;"> +7 (707) 991 22 91</a>
                            </li>
                            <li>
                                <strong>E mail</strong>
                                <a href="mailto:janelim.kz@gmail.com" style="line-height: 2.5rem; font-weight: 400;">janelim.kz@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h2>Есть вопросы?</h2>
                        <!-- Contact Form of the Page -->
                        <form action="#" class="contact-form">
                            <fieldset>
                                <input type="text" class="form-control" placeholder="Name">
                                <input type="email" class="form-control" placeholder="E-Mail">
                                <input type="text" class="form-control" placeholder="Subject">
                                <textarea class="form-control" placeholder="Message"></textarea>
                                <button class="btn-type3" type="submit">Отправить</button>
                            </fieldset>
                        </form>
                        <!-- Contact Form of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Contact Detail of the Page end -->
        <!-- Mt Map Holder of the Page -->
        
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_design.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>