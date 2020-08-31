<?php

use App\Admin\SocialNetwork;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
/** @var \App\Models\Users $person */
?>
<!-- Mt Team Section of the Page -->
<section class="mt-team-sec">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h3>Администарция</h3>
          <div class="holder">
              @foreach($administration_persons as $person)
                  <?php
                  $socialNetworks = DB::table('ref_social_network_items')
                      ->where(['item_id' => $person->id])
                      ->where(['type_id' => \App\Admin\SocialNetwork::ADMINISTRATION_PERSON])
                      ->get();


                  if ($socialNetworks) {
                      $socialNetworks = collect($socialNetworks)->all();
                      $socialNetworks = Arr::pluck($socialNetworks, 'url', 'social_network_id');
                      $faceBook = isset($socialNetworks[SocialNetwork::FACEBOOK]) ? $socialNetworks[SocialNetwork::FACEBOOK] : '';
                      $whatsapp = isset($socialNetworks[SocialNetwork::WHATSAPP]) ? $socialNetworks[SocialNetwork::WHATSAPP] : '';
                      $instagram = isset($socialNetworks[SocialNetwork::INSTAGRAM]) ? $socialNetworks[SocialNetwork::INSTAGRAM] : '';
                  }
                  ?>
                  <div class="col wow fadeInLeft" data-wow-delay="0.4s">
                      <div class="img-holder">
                          <a href="#">
                              <div style="
                                      background-image: url('{{$person->image}}');
                                      background-size: cover;
                                      background-repeat: no-repeat;
                                      background-position: center;
                                      width: 280px;
                                      height: 290px;
                                      ">

                              </div>
                              <ul class="list-unstyled social-icon">
                                  <li><i onclick="location.href='{{$whatsapp}}';" class="fa fa-whatsapp"></i></li>
                                  <li><i onclick="location.href='{{$faceBook}}';" class="fa fa-facebook"></i></li>
                                  <li><i onclick="location.href='{{$instagram}}';" class="fa fa-instagram"></i></li>
                              </ul>
                          </a>
                      </div>
                      <div class="mt-txt">
                          <h4><a href="#">{{$person->full_name}}</a></h4>
                          <span class="sub-title" style="white-space: pre-line;">
                              {{$person->responsibility}}
                          </span>
                      </div>
                  </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Mt About Section of the Page -->