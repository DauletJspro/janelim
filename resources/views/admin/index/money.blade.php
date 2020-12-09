<div class="row profits">
    <div style="padding-left: 2rem;"><h3 style="font-size: 3rem;"> Текущий счет</h3></div>
<section class="content">
    <div class="row statistics-profile">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{round(Auth::user()->user_money,2)}}<sup style="font-size: 20px">$</sup></h3>
                    <h2 style="margin-top: 0px">{{Auth::user()->user_money * App\Models\Currency::DollarToKzt}} &#8376;</h2>
                    <p>Текущий баланс</p>
                </div>
                <div class="icon">

                </div>
                <a href="#" class="small-box-footer">Баланс</a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>{{round($cvData['cvWithdrawMoney'],2)}}<sup style="font-size: 20px">$</sup></h3>
                    <h2 style="margin-top: 0px">{{round($cvData['cvWithdrawMoney'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
                    <p>Сумма, которая была снята</p>
                </div>
                <div class="icon">

                </div>
                <a href="#" class="small-box-footer">Баланс</a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>{{round($cvData['cvSendMoney'],2)}}<sup style="font-size: 20px">$</sup></h3>
                    <h2 style="margin-top: 0px">{{round($cvData['cvSendMoney'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
                    <p>Сумма, которая была отправлена</p>
                </div>
                <div class="icon">

                </div>
                <a href="#" class="small-box-footer">Баланс</a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{round($cvData['cvProfitAll'],2)}}<sup style="font-size: 20px">$</sup></h3>
                    <h2 style="margin-top: 0px">{{round($cvData['cvProfitAll'] * \App\Models\Currency::GVtoKzt,2)}} &#8376;</h2>
                    <p>За весь период</p>
                </div>
                <div class="icon">

                </div>
                <a href="#" class="small-box-footer">Доход</a>
            </div>
        </div><!-- ./col -->
            <div style="clear: both"></div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>500<sup style="font-size: 20px">Тенге</sup></h3>
                        <h2 style="margin-top: 0px">&nbsp;<sup style="font-size: 20px">&nbsp;</sup></h2>
                        <p>1 $ =500 т.г. </p>
                    </div>
                    <div class="icon">

                    </div>
                    <a href="#" class="small-box-footer">Курс</a>
                </div>
            </div><!-- ./col -->
    </div>
</section>
</div>