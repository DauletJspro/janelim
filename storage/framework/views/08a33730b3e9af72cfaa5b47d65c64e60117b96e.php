<?php $__env->startSection('meta-tags'); ?>

    <title>Новости. Roiclub.kz</title>
    <meta name="description" content="Новости. Roiclub.kz - это группа единомышленников, которые уже имеют богатый опыт работы в МЛМ - индустрии, интернет-коммерции и обладают всеми необходимыми качествами для достижения поставленных целей" />
    <meta name="keywords" content="Новости, Roiclub.kz" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="breadcrumb-trail breadcrumbs">
            <span class="trail-browse"></span>
            <span class="trail-begin"></span>
            <span class="trail-end">&nbsp;</span>
        </div>
    </div>

    <div id="content" class="page-wrap fullwidth">
        <div class="container content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page">
                        <div id="primary" class="content-area fullwidth">
                            <main id="main" class="site-main" role="main">
                                <div class="vc_row wpb_row vc_row-fluid themesflat_1501148753">
                                    <div class="row_overlay" style=""></div>
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner vc_custom_1494562006228">
                                            <div class="wpb_wrapper">
                                                <div class="title-section   vc_custom_1494564433649 ">
                                                    <h1 class="title">
                                                        Новости
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row wpb_row vc_row-fluid themesflat_1501148753">
                                    <div class="row_overlay" style=""></div>

                                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <div class="wpb_column vc_column_container vc_col-sm-4">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="themesflat_iconbox themesflat_custom_btn inline-left transparent  vc_custom_1496462588057">
                                                        <div class="iconbox-image">
                                                            <img src="<?php echo e($item->news_image); ?>?width=370&height=240"/>
                                                        </div>

                                                        <div class="iconbox-content">
                                                            <h5 class="title" style="font-size: 20px;font-weight: 500">
                                                                <a href="/news/<?php echo e(\App\Http\Helpers::getTranslatedSlugRu($item['news_name_'.$lang])); ?>-u<?php echo e($item->news_id); ?>"><?php echo e($item['news_name_'.$lang]); ?></a>
                                                            </h5>

                                                            <p style="letter-spacing: 0.1px; margin-bottom: 8px;"><?php echo e($item['news_desc_'.$lang]); ?></p>

                                                            <p><a class="themesflat-button no-background"
                                                                  href="/news/<?php echo e(\App\Http\Helpers::getTranslatedSlugRu($item['news_name_'.$lang])); ?>-u<?php echo e($item->news_id); ?>">Подробнее<i class="readmore-icon fa fa-chevron-right"></i></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                </div>

                                <div class="col-md-12">
                                    <?php echo e($news->appends(\Illuminate\Support\Facades\Input::except('page'))->links()); ?>

                                </div>

                            </main><!-- #main -->
                        </div><!-- #primary -->

                </div>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('index.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>