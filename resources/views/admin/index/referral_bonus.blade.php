<div class="row profits">
    <div style="padding-left: 2rem;"><h3 style="font-size: 3rem;">Реферальный бонус</h3></div>
    <section class="content">
        <div class="row statistics-profile">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{round($pvData['pvProfitToday'],2)}}<sup style="font-size: 20px">$</sup></h3>
                        <h2 style="margin-top: 0px">{{round($pvData['pvProfitToday'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
                        <p>На сегодня</p>
                    </div>
                    <div class="icon">

                    </div>
                    <a href="#" class="small-box-footer">Доход</a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{round($pvData['pvProfitLastWeek'],2)}}<sup style="font-size: 20px">$</sup></h3>
                        <h2 style="margin-top: 0px">{{round($pvData['pvProfitLastWeek'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
                        <p>За неделю</p>
                    </div>
                    <div class="icon">

                    </div>
                    <a href="#" class="small-box-footer">Доход</a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{round($pvData['pvProfitLastMonth'],2)}}<sup style="font-size: 20px">$</sup></h3>
                        <h2 style="margin-top: 0px">{{round($pvData['pvProfitLastMonth'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
                        <p>За месяц</p>
                    </div>
                    <div class="icon">

                    </div>
                    <a href="#" class="small-box-footer">Доход</a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{round($pvData['pvProfitAll'],2)}}<sup style="font-size: 20px">$</sup></h3>
                        <h2 style="margin-top: 0px">{{round($pvData['pvProfitAll'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
                        <p>За весь период</p>
                    </div>
                    <div class="icon">

                    </div>
                    <a href="#" class="small-box-footer">Доход</a>
                </div>
            </div><!-- ./col -->
        </div>
    </section>
</div>
