<div class="row profits">
    <div style="padding-left: 2rem;"><h3 style="font-size: 3rem;">Группавой Обьем</h3></div>
    <section class="content">
        <div class="row statistics-profile">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{round($gvData['gvProfitToday'],2)}}<sup style="font-size: 20px">$</sup></h3>
                        <h2 style="margin-top: 0px">{{round($gvData['gvProfitToday'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
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
                        <h3>{{round($gvData['gvProfitLastWeek'],2)}}<sup style="font-size: 20px">$</sup></h3>
                        <h2 style="margin-top: 0px">{{round($gvData['gvProfitLastWeek'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
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
                        <h3>{{round($gvData['gvProfitLastMonth'],2)}}<sup style="font-size: 20px">$</sup></h3>
                        <h2 style="margin-top: 0px">{{round($gvData['gvProfitLastMonth'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
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
                        <h3>{{round($gvData['gvProfitAll'],2)}}<sup style="font-size: 20px">$</sup></h3>
                        <h2 style="margin-top: 0px">{{round($gvData['gvProfitAll'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
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