<!-- Mt About Section of the Page -->
<section class="mt-about-sec wow fadeInUp" data-wow-delay="0.4s">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="txt">
            
            
            <h2> <?php echo app('translator')->get('app.title_opportunity'); ?></h2>
            <div class="opportunity_content">
              <!DOCTYPE html>
                <html>
                  <head>
                  </head>
                  <body>                  
                  <p><strong> <?php echo app('translator')->get('app.packets'); ?>:</strong></p>
                  <div class="packets_container">
                    <div class="packets_mob">
                      <p> <?php echo app('translator')->get('app.packet'); ?>: <span style="font-weight: 700">SMALL</span> </p>
                      <p> <?php echo app('translator')->get('app.cost'); ?>: <span style="font-weight: 700">12&nbsp;000 тг</span>. </p> 
                      <p> <?php echo app('translator')->get('app.volume'); ?>: <span style="font-weight: 700">20  PV</span>. </p>
                      <p> <?php echo app('translator')->get('app.status'); ?>: <span style="font-weight: 700"> <?php echo app('translator')->get('app.status_client'); ?> </span>. </p>
                      <p> <?php echo app('translator')->get('app.income'); ?>: <span style="font-weight: 700"> <?php echo app('translator')->get('app.income_level_4'); ?></span>.</p>
                    </div>
                    <div class="packets_mob">
                      <p> <?php echo app('translator')->get('app.packet'); ?>: <span style="font-weight: 700">MEDIUM</span> </p>
                      <p> <?php echo app('translator')->get('app.cost'); ?>: <span style="font-weight: 700">36&nbsp;000 тг</span>. </p> 
                      <p> <?php echo app('translator')->get('app.volume'); ?>: <span style="font-weight: 700">60  PV</span>. </p>
                      <p> <?php echo app('translator')->get('app.status'); ?>: <span style="font-weight: 700"> <?php echo app('translator')->get('app.status_consultant'); ?></span>. </p>
                      <p> <?php echo app('translator')->get('app.income'); ?>: <span style="font-weight: 700"><?php echo app('translator')->get('app.income_level_6'); ?></span>.</p>
                    </div>
                    <div class="packets_mob">
                      <p> <?php echo app('translator')->get('app.packet'); ?>: <span style="font-weight: 700">LARGE</span> </p>
                      <p> <?php echo app('translator')->get('app.cost'); ?>: <span style="font-weight: 700">72&nbsp;000 тг</span>. </p> 
                      <p> <?php echo app('translator')->get('app.volume'); ?>: <span style="font-weight: 700">120  PV</span>. </p>
                      <p> <?php echo app('translator')->get('app.status'); ?>: <span style="font-weight: 700"><?php echo app('translator')->get('app.status_manager'); ?></span>. </p>
                      <p> <?php echo app('translator')->get('app.income'); ?>: <span style="font-weight: 700"><?php echo app('translator')->get('app.income_level_8'); ?></span>.</p>
                    </div>
                    <div class="packets_mob">
                      <p> <?php echo app('translator')->get('app.packet'); ?>: <span style="font-weight: 700">VIP</span> </p>
                      <p> <?php echo app('translator')->get('app.cost'); ?>: <span style="font-weight: 700">144&nbsp;000 тг</span>. </p> 
                      <p> <?php echo app('translator')->get('app.volume'); ?>: <span style="font-weight: 700">240  PV</span>. </p>
                      <p> <?php echo app('translator')->get('app.status'); ?>: <span style="font-weight: 700"><?php echo app('translator')->get('app.status_director'); ?></span>. </p>
                      <p> <?php echo app('translator')->get('app.income'); ?>: <span style="font-weight: 700"><?php echo app('translator')->get('app.income_level_10'); ?></span>.</p>
                    </div>
                  </div>                  

                  <p><strong> <?php echo app('translator')->get('app.incomes'); ?></strong></p>
                  <ol>
                    <li style="font-size: 24px; font-weight: 600;">
                      <p><strong> <?php echo app('translator')->get('app.referral_income'); ?></strong></p>
                    </li>
                  </ol>
                  <p> <?php echo app('translator')->get('messages.referral_income_text'); ?></p>
                  <div class="table-responsive">
                    <table class="table" style="border-collapse: collapse; width: 100%; text-align:center; font-weight: 700;" border="1">
                      <tbody>
                        <tr>
                          <td style="width: 20%;" scope="col"> <?php echo app('translator')->get('app.packets'); ?></td>
                          <td style="width: 8%;">1</td>
                          <td style="width: 8%;">2</td>
                          <td style="width: 8%;">3</td>
                          <td style="width: 8%;">4</td>
                          <td style="width: 8%;">5</td>
                          <td style="width: 8%;">6</td>
                          <td style="width: 8%;">7</td>
                          <td style="width: 8%;">8</td>
                          <td style="width: 8%;">9</td>
                          <td style="width: 8%;">10</td>
                        </tr>
                        <tr>
                          <td style="width: 20%;"> <?php echo app('translator')->get('app.small_packet'); ?></td>
                          <td style="width: 8%;">15%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                        </tr>
                        <tr>
                          <td style="width: 20%;"> <?php echo app('translator')->get('app.medium_packet'); ?></td>
                          <td style="width: 8%;">15%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                        </tr>
                        <tr>
                          <td style="width: 20%;" scope="col"> <?php echo app('translator')->get('app.large_packet'); ?></td>
                          <td style="width: 8%;">15%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                        </tr>
                        <tr>
                          <td style="width: 20%;" scope="col"> <?php echo app('translator')->get('app.vip_packet'); ?></td>
                          <td style="width: 8%;">15%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                        </tr>
                      </tbody>
                    </table>
                    
                  </div>                                    
                  <ol start="2">
                    <li style="font-size: 24px; font-weight: 600;">
                      <p><strong> <?php echo app('translator')->get('app.activation_income'); ?></strong></p>
                    </li>
                  </ol>
                  <p> <?php echo app('translator')->get('app.activation_income_text'); ?> </p>
                  
                  <div class="table-responsive">
                    <table class="table" style="border-collapse: collapse; width: 100%; text-align:center; font-weight: 700;" border="1">
                      <tbody>
                        <tr>
                          <td style="width: 20%;" scope="col"> <?php echo app('translator')->get('app.packets'); ?></td>
                          <td style="width: 8%;">1</td>
                          <td style="width: 8%;">2</td>
                          <td style="width: 8%;">3</td>
                          <td style="width: 8%;">4</td>
                          <td style="width: 8%;">5</td>
                          <td style="width: 8%;">6</td>
                          <td style="width: 8%;">7</td>
                          <td style="width: 8%;">8</td>
                          <td style="width: 8%;">9</td>
                          <td style="width: 8%;">10</td>
                        </tr>
                        <tr>
                          <td style="width: 20%;"><?php echo app('translator')->get('app.small_packet'); ?></td>
                          <td style="width: 8%;">15%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                        </tr>
                        <tr>
                          <td style="width: 20%;"><?php echo app('translator')->get('app.medium_packet'); ?></td>
                          <td style="width: 8%;">15%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                        </tr>
                        <tr>
                          <td style="width: 20%;" scope="col"><?php echo app('translator')->get('app.large_packet'); ?></td>
                          <td style="width: 8%;">15%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">-</td>
                          <td style="width: 8%;">-</td>
                        </tr>
                        <tr>
                          <td style="width: 20%;" scope="col"><?php echo app('translator')->get('app.vip_packet'); ?></td>
                          <td style="width: 8%;">15%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">5%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                          <td style="width: 8%;">3%</td>
                        </tr>
                      </tbody>
                    </table>
                    
                  </div>

                  <ol start="3">
                    <li style="font-size: 24px; font-weight: 600;">
                      <p><strong> <?php echo app('translator')->get('app.gift_income'); ?> </strong></p>
                    </li>
                  </ol>
                  <p> <?php echo app('translator')->get('app.gift_income_text'); ?> </p>

                  <div class="table-responsive">
                    <table class="table" style="border-collapse: collapse; width: 100%; text-align:center; font-weight: 700;" border="1">
                      <tbody>
                        <tr>
                          <td style="width: 40%;" scope="col"> <?php echo app('translator')->get('app.status'); ?> </td>
                          <td style="width: 10%;"> <?php echo app('translator')->get('app.condition_1'); ?> <br> ЛО </td>
                          <td style="width: 10%;"> <?php echo app('translator')->get('app.condition_2'); ?> <br> ГО </td>
                          <td style="width: 10%;"> <?php echo app('translator')->get('app.condition_3'); ?> <br>  <?php echo app('translator')->get('app.balance'); ?> </td>
                          <td style="width: 30%;"> <?php echo app('translator')->get('app.gift'); ?> </td>
                        </tr>
                        <tr>
                          <td style="width: 40%;"> <?php echo app('translator')->get('app.status_client'); ?> </td>
                          <td style="width: 10%;">20PV</td>
                          <td style="width: 10%;"></td>
                          <td style="width: 10%;"></td>
                          <td style="width: 30%;"></td>
                        </tr>
                        <tr>
                          <td style="width: 40%;"> <?php echo app('translator')->get('app.status_consultant'); ?> </td>
                          <td style="width: 10%;">60PV</td>
                          <td style="width: 10%;">3 000GV</td>
                          <td style="width: 10%;">3 x 1 000GV</td>
                          <td style="width: 30%;">150 000 тг</td>
                        </tr>
                        <tr>
                          <td style="width: 40%;" scope="col"> <?php echo app('translator')->get('app.status_manager'); ?> </td>
                          <td style="width: 10%;">120PV</td>
                          <td style="width: 10%;">9 000GV</td>
                          <td style="width: 10%;">3 x 3 000GV</td>
                          <td style="width: 30%;">450 000 тг</td>
                        </tr>
                        <tr>
                          <td style="width: 40%;" scope="col"> <?php echo app('translator')->get('app.status_director'); ?> </td>
                          <td style="width: 10%;">240PV</td>
                          <td style="width: 10%;">27 000GV</td>
                          <td style="width: 10%;">3 x 9 000GV</td>
                          <td style="width: 30%;">1 000 000 тг</td>
                        </tr>
                        <tr>
                          <td style="width: 40%;" scope="col"> <?php echo app('translator')->get('app.status_bronze_director'); ?></td>
                          <td style="width: 10%;">240PV</td>
                          <td style="width: 10%;">81 000GV</td>
                          <td style="width: 10%;">3 x 27 000GV</td>
                          <td style="width: 30%;">2 500 000 тг</td>
                        </tr>
                        <tr>
                          <td style="width: 40%;" scope="col"> <?php echo app('translator')->get('app.status_silver_director'); ?></td>
                          <td style="width: 10%;">240PV</td>
                          <td style="width: 10%;">243 000GV</td>
                          <td style="width: 10%;">3 x 81 000GV</td>
                          <td style="width: 30%;"> <?php echo app('translator')->get('app.car'); ?> <br> 6 500 000 тг</td>
                        </tr>
                        <tr>
                          <td style="width: 40%;" scope="col"> <?php echo app('translator')->get('app.status_gold_director'); ?></td>
                          <td style="width: 10%;">240PV</td>
                          <td style="width: 10%;">729 000GV</td>
                          <td style="width: 10%;">3 x 243 000GV</td>
                          <td style="width: 30%;"> <?php echo app('translator')->get('app.flat'); ?> <br> 20 000 000 тг</td>
                        </tr>
                        <tr>
                          <td style="width: 40%;" scope="col"> <?php echo app('translator')->get('app.status_brilliant'); ?></td>
                          <td style="width: 10%;">240PV</td>
                          <td style="width: 10%;">2 187 000GV</td>
                          <td style="width: 10%;">3 x 729 000GV</td>
                          <td style="width: 30%;"> <?php echo app('translator')->get('app.cottage'); ?> <br> 40 000 000 тг</td>
                        </tr>
                      </tbody>
                    </table>
                    
                  </div>                          
                  </body>
                </html>
            </div>
          </div>
          <p style="white-space: pre-line;">
            <strong style="white-space: pre-line;">
              <?php echo app('translator')->get('app.future_with_company'); ?>
              
            </strong>
            
          </p>
          <div class="mt-follow-holder">
            <span class="title"><?php echo app('translator')->get('app.subscribe'); ?></span>
            <!-- Social Network of the Page -->
            <ul class="list-unstyled social-network">
              
              
              
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              
              <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
            </ul>
            <!-- Social Network of the Page end -->
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Mt About Section of the Page -->