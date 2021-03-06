<section class="content-header">
    <h1>
        Бонус по статусу
    </h1>
</section>

<section class="content">

    <div class="row statistics-profile">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo e($row->my_shareholder_money2); ?></h3>
                    <h2 style="margin-top: 0px">&nbsp;<sup style="font-size: 20px">&nbsp;</sup></h2>
                    <p>Мой бонус</p>
                </div>
                <div class="icon">

                </div>
                <a href="#" class="small-box-footer">Доля</a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo e($row->shareholder_money_all2); ?></h3>
                    <h2 style="margin-top: 0px">&nbsp;<sup style="font-size: 20px">&nbsp;</sup></h2>
                    <p>Общая количество долей</p>
                </div>
                <div class="icon">

                </div>
                <a href="#" class="small-box-footer">Доля</a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo e($row->shareholder_count2); ?></h3>
                    <h2 style="margin-top: 0px">&nbsp;<sup style="font-size: 20px">&nbsp;</sup></h2>
                    <p>Количество дольщиков</p>
                </div>
                <div class="icon">

                </div>
                <a href="#" class="small-box-footer">Дольщики по статусу</a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo e(round($row->shareholder_profit_today2,2)); ?><sup style="font-size: 20px">$</sup></h3>
                    <h2 style="margin-top: 0px"><?php echo e(round($row->currency->money * $row->shareholder_profit_today2,2)); ?><sup style="font-size: 20px">ТГ</sup></h2>
                    <p>Поступления</p>
                </div>
                <div class="icon">

                </div>
                <a href="#" class="small-box-footer">Доход</a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php echo e(round($row->shareholder_average_mount2,3)); ?><sup style="font-size: 20px">$</sup></h3>
                    <h2 style="margin-top: 0px"><?php echo e(round($row->currency->money * $row->shareholder_average_mount2,3)); ?><sup style="font-size: 20px">ТГ</sup></h2>
                    <p>Средний чек</p>
                </div>
                <div class="icon">

                </div>
                <a href="#" class="small-box-footer">Чек</a>
            </div>
        </div><!-- ./col -->
    </div>
</section>