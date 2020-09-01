<?php $__env->startSection('meta-tags'); ?>

    <title>Главная</title>
    <meta name="description"
          content="«JanElim - это проект предлагающий уникальную натуральную продукцию с широкими бизнес возможностями"/>
    <meta name="keywords" content="Jan Elim"/>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- mt main start here -->
<main id="mt-main">
    <?php echo $__env->make('new_design.index._first_section', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('new_design.index._second_section', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('new_design.index._third_section', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
        </div>
    </div>
</main>
<!-- footer of the Page -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_design.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>