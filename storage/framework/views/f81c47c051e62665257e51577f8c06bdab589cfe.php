<?php $__env->startSection('meta-tags'); ?>
    <title>Мүмкіндіктер</title>
    <meta name="description" content="JanElim - это проект предлагающий уникальную натуральную продукцию с широкими бизнес возможностями"/>
    <meta name="keywords" content="Jan Elim"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Main of the Page -->
<main id="mt-main">
    <?php echo $__env->make('new_design.opportunity._first_section', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('new_design.opportunity._second_section', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    
</main><!-- Main of the Page end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>        
        $(document).ready(function() {            
            // inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
            $('.table-responsive-stack').find("th").each(function (i) {                
                $('.table-responsive-stack td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">'+ $(this).text() + ':</span> ');
                $('.table-responsive-stack-thead').hide();
            });

            $('.table-responsive-stack').each(function() {
                var thCount = $(this).find("th").length; 
                var rowGrow = 100 / thCount + '%';
                //console.log(rowGrow);
                $(this).find("th, td").css('flex-basis', rowGrow);   
            });

            function flexTable() {
                if ($(window).width() < 768) {
            
                    $(".table-responsive-stack").each(function (i) {
                        $(this).find(".table-responsive-stack-thead").show();
                        $(this).find('thead').hide();
                    });                            
                    // window is less than 768px   
                } else {
                            
                    $(".table-responsive-stack").each(function (i) {
                        $(this).find(".table-responsive-stack-thead").hide();
                        $(this).find('thead').show();
                    });                
                }
                // flextable   
            }
            flexTable();
            window.onresize = function(event) {
                flexTable();
            };
            // document ready  
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_design.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>