<style>
  .eventholder {
    margin: 15px 0;
    display: flex;
    justify-content: center;
  }

  .eventholder a {
    font-size: 16px;
    cursor: pointer;
    margin: 0 5px;
    color: #333;
    padding: 6px 12px;
  }

  .eventholder a:hover {
    background-color: #f7b135;
    color: #fff;
  }

  .eventholder a.jp-previous {
    margin-right: 15px;
  }

  .eventholder a.jp-next {
    margin-left: 15px;
  }

  .eventholder a.jp-current,
  a.jp-current:hover {
    color: #fff;
    font-weight: bold;
  }

  .eventholder a.jp-disabled,
  a.jp-disabled:hover {
    color: #bbb;
  }

  .eventholder a.jp-current,
  a.jp-current:hover,
  .eventholder a.jp-disabled,
  a.jp-disabled:hover {
    cursor: default;
    background: none;
  }

  .eventholder span {
    margin: 0 5px;
  }

  .eventholder a.jp-current {
    background: #f7b135;

  }

  .eventholder a:hover {
    color: #fff !important;
  }
</style>
<!-- Section: Project -->
<section data-tm-bg-color="#f5f5f4">
  <div class="container pt-0 pt-lg-200 pb-40">
    <div class="section-content">
      <div class="row">

      <div class="col-lg-4">
            <div class="tm-sc-project-items project-items-current-theme-style1 text-center pb-md-150">
              <div class="project-item">
                <div class="thumb">
                  <img class="border-rounded" width="250px" height="250px" src="assets/images/about/srilaprabhu.jpg" alt="Image">
                </div>
                <div class="content">
                  <h5 class="title"><a href="the-guru">HDG Srila Prabhupada</a></h5>
                  <p></p>
                  <a class="btn-link" href="the-guru">
                    <i class="fas fa-chevron-up"></i>
                    <img class="shape-circle" src="assets/images/shape/project-01.png" alt="Image">
                  </a>
                </div>
              </div>
            </div>
          </div>

        <?php foreach ($gallery as $row) { ?>
          <div class="col-lg-4">
            <div class="tm-sc-project-items project-items-current-theme-style1 text-center pb-md-150">
              <div class="project-item">
                <div class="thumb">
                  <img class="border-rounded" width="250px" height="250px" src="<?php echo GALLERY_IMG_UPLOAD_PATH . $row->gallery_img; ?>" alt="Image">
                </div>
                <div class="content">
                  <h5 class="title"><a href="<?php echo 'gallery/show_gallery/'.$row->category_id; ?>"><?php echo $row->category_name; ?></a></h5>
                  <p><?php echo $row->description; ?></p>
                  <a class="btn-link" href="<?php echo $row->page_slug; ?>">
                    <i class="fas fa-chevron-up"></i>
                    <img class="shape-circle" src="assets/images/shape/project-01.png" alt="Image">
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>


      </div>
    </div>
  </div>
</section>

<section data-tm-bg-color="#f5f5f4" style="background-color: rgb(245, 245, 244) !important;">
      <div class="container pt-10 pb-110">
        <div class="section-content">
          <div class="row">
          
          </div>
        </div>
      </div>
    </section>


<section class="container-fluid" style="background-color: #fff !important; margin-top: -140px">
  <div class="container p-0 mt-40 ">
    <div class="row p-20">

      <div class="tm-sc-section-title section-title text-center mb-40">
        <div class="row justify-content-md-center">
          <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-6">
            <div class="title-wrapper mb-1">
              <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Upcoming Events</h6>
              <h2 class="title mb-0">Temple Means Festivals</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-5">
        <div class="play-video-style1 ">
          <div class="">
            <div class="video-box mr-30">
              <img class="w-100 img-responsive" src="assets/images/bg/Hkm-video-cover.jpg" alt="Image">
              <div class="video-button-inner">
                <div class="play-button"><span class="play-icon"><i class="fa fa-play"></i></span></div>
                <a class="hover-link" data-lightbox-gallery="youtube-video" href="https://youtu.be/8tehy8DCY80" title=""></a>
                
              </div>
            </div>
            
            
            <h5 class="text-theme-colored3">Hare Krishna Mandir, Bhadaj, Ahmedabad</h5>
          <p><?php echo substr("Hare Krishna Mandir, Bhadaj, is one of the most renowned places to visit in Ahmedabad. Since its inauguration in April 2015, the temple has been standing as a beacon of spirituality and service to mankind. Being one of the most popular places in Ahmedabad, Hare Krishna Mandir is not visited just by the devotees seeking Lord’s blessings but also by those who are looking for spiritual solace, away from the din and chaos of mundane life.",0,100).'...'; ?></p>
        </div>

          
        </div>

      </div>
      <div class="col-md-7">


        <div id="event-scroll" class="tm-sc-custom-columns-holder-item" data-item-class="tm-custom-columns-12" style="overflow-y:scroll;height: 550px; overflow: -moz-scrollbars-none;  overflow: -moz-scrollbars-none;scrollbar-width: none;-ms-overflow-style: none; -webkit-scrollbar-display:none">
        <style>
          #event-scroll::-webkit-scrollbar {
  display: none;
}
        </style>  
        <div class="item-inner">
            <div class="item-content tm-custom-columns-8  " id="event-scroll-top" data-tm-bg-color="#fff" style="background-color: #fff !important;">
            <?php if(count($events) >= 4) { ?>
            <style>
               #event-scroll-top{
                transition: all 3s;
               }
                 #event-scroll-top:hover{
                  transform: translateY(-120px);
                  transition: all 10s;
                }
              </style>
              <?php } 
              ?>
              <?php foreach ($events as $event) {

                $start_date = explode(' ', date('Y F d', strtotime($event->start_date)));
                $end_date = explode(' ', date('Y F d', strtotime($event->end_date)));
              ?>
                <div class="upcoming-events-current-style bg-white " data-tm-margin-bottom="20" style="margin-bottom: 20px;margin-left: 0px">
                  
                  <div class="thumb">
                    <img src="<?php echo EVENT_COVER_IMAGE_UPLOAD_PATH.$event->event_cover_image; ?>" alt="Image" width="100px" height="100px!important">
                  </div>
                  <div class="event-details">
                    <h5 class="event-title mb-0 mt-0 "><a href="<?php echo !empty($event->event_redirection_link) ? $event->event_redirection_link : base_url() . 'index/event/' . $event->event_id; ?>"><?php echo $event->event_name; ?></a></h5>
                    <div class="event-time line-height-1 mb-10"><i class="text-theme-colored1 far fa-clock"> </i>&nbsp; <?php echo $event->start_date ; ?></div>
                    <!-- <div class="event-location line-height-1 mb-10"><i class="text-theme-colored1 fas fa-map-marker-alt"></i> <?php echo $event->place; ?></div> -->
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="eventholder d-flex justify-content-center">
           
            </div>
          </div>
         
        </div>
                <!--<div class="container p-0">-->
                <!--  <div class="row">-->
                <!--    <div class="col-sm-2 mx-auto">-->
                <!--      <a class="btn-link" style="">-->
                <!--        <i class="fas fa-chevron-down"></i>-->
                       
                <!--      </a>-->

                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
      </div>
    </div>

  </div>
</section>



<!-- Section: Causes -->
<section style="background: #ececeb;">
  <div class="container pt-50">
    <div class="tm-sc-section-title section-title text-center mb-50">
      <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
          <div class="title-wrapper mb-1">
            <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Join Us in The Service of Lord</h6>
            <h2 class="title mb-0">Offer Seva</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content position-relative z-index-1">
      <div class="row">
        <?php foreach($sevas as $seva){
         
        $start = strtotime($seva->created_date);
        $end = strtotime($seva->celebration_date);
        $current = strtotime(date('Y-m-d'));
        $completed = (($current - $start) / ($end - $start)) * 100;
        $daysleft = round(($end - strtotime(date('Y-m-d'))) / (60 * 60 * 24));
      
        if($daysleft <= 0){
          $daysleft = 0;
        }
          ?>
        <div class="col-md-6 col-lg-4">
          <div class="causes-item-current-style1" style=" height: 100%;">
            <div class="causes-item mb-lg-30">
              <div class="causes-thumb">
                <img src="<?php echo SEVA_PAGE_BANNER_PATH.$seva->seva_page_banner; ?>" alt="Image" class="w-100">
                <a href="<?php echo $seva->page_slug; ?>" class="btn btn-donate-now">Donate Now</a>
              </div>
              <div class="causes-details bg-white">
                <div class="donation-goal mb-1">
                  <!-- <div class="raised">Goal: <span class="text-theme-colored1 font-weight-500">3600.00 USD</span></div> -->
                </div>
                <h6 class="causes-title text-center"><a href="<?php echo $seva->page_slug; ?>"><?php echo $seva->sevas_page_title; ?></a></h6>
              </div>
              <!-- <div class="tm-sc-progress progress-item">
                <div class="tm-sc-progress-bar progress-bar-fixed-right-percent d-flex align-items-center" data-percent="<?php echo $completed ?>" data-bar-height="10">
                  <div class="progress-title mr-10">
                    <div class="font-size-14">Days Left:</div>
                  </div>
                  <div class="progress-holder w-100" data-tm-border-radius="10">
                    <div class="progress-content bg-theme-colored2" data-width="<?php echo $completed ?>%" data-tm-border-radius="10"></div>
                  </div>
                  <div class="progress-title-holder ml-10">
                    <span class="percent position-relative font-size-14"><span class="symbol-left"></span><span class=""></span><span class="symbol-right"><?php echo $daysleft ?>&nbsp;days</span></span>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <?php } ?>
       
      </div>
    </div>
  </div>
  <div class="tm-floating-objects d-none d-xl-block">
    <span class="floating-object-1 tm-animation-floating" data-tm-bg-img="assets/images/shape/bottle.png" data-tm-width="220" data-tm-height="198" data-tm-top="-70" data-tm-bottom="auto" data-tm-left="85" data-tm-right="auto" data-tm-opacity="1"></span>
    <span class="floating-object-1" data-tm-bg-img="assets/images/shape/fans.png" data-tm-width="361" data-tm-height="536" data-tm-top="auto" data-tm-bottom="0" data-tm-left="auto" data-tm-right="0" data-tm-opacity="1"></span>
  </div>
</section>




<!--<section>-->
<!--      <div class="container pt-0 pb-80">-->
<!--        <div class="section-content">-->
<!--          <div class="row">-->
<!--            <div class="col-lg-12 col-xl-6">-->
<!--              <div class="image-wrapper-style1 pt-50 mb-md-40">-->
<!--                <div class="image-layer1">-->
<!--                  <img class="w-75" src="assets/images/about/prabhupada.jpg" alt="Image">-->
<!--                </div>-->
<!--                <div class="impact-project bg-theme-colored1">-->
                  <!-- <div class="icon">                    
<!--                    <img src="assets/images/icons/d01.png" alt="Image">-->
<!--                  </div> -->-->
<!--                  <h5 class="title text-white">HDG Srila Prabhupada</h5>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="col-lg-12 col-xl-6 ">-->
<!--              <div class="pl-70 pl-lg--0 pr-50 pr-lg--0">-->
<!--                <div class="tm-sc-section-title section-title pt-60" data-tm-margin-bottom="14" style="margin-bottom: 14px;">-->
<!--                  <div class="title-wrapper mb-0">-->
<!--                    <h6 class="subtitle line-shape-bottom  text-theme-colored1">Who is a Guru?</h6>-->
<!--                    <h2 class="title mb-0">Need of a Spiritual Master</h2>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <ul class="unordered-list-current-style1 mb-10 p-10 pl-25" data-tm-bg-color="#f4f3f0" style="background-color: rgb(244, 243, 240) !important;">-->
<!--                  <li class="text-theme-colored3 font-size-20"><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> A spiritual master is the representative of the Supreme Personality of Godhead. </li>-->
<!--                </ul>-->
<!--                <p class="paragraph font-size-18 mb-50">A guru should be approached not for any material benefit but only for the purpose of getting liberated from the pangs of material existence. It is explained in Srimad Bhagavatam</p>-->
<!--                <a href="page-about.html" class="btn btn-outline-theme-colored1 btn-outline btn-round btn-current-style1 text-uppercase"> Discover more </a>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="tm-floating-objects">-->
<!--        <span class="bg-img-cover z-index--1 d-none d-xl-block" data-tm-bg-img="assets/images/bg/divider-bg3.jpg" data-tm-width="33.45%" data-tm-height="calc(100% - 120px)" data-tm-top="0" data-tm-bottom="auto" data-tm-left="0" data-tm-right="auto" data-tm-opacity="1" style="background-image: url(&quot;assets/images/bg/divider-bg3.jpg&quot;); opacity: 1; height: calc(100% - 120px); width: 33.45%; inset: 0px auto auto 0px;"></span>-->
<!--        <span class="floating-object-1 tm-animation-floating z-index--1 d-none d-xxl-block" data-tm-bg-img="assets/images/shape/about-01.png" data-tm-width="76" data-tm-height="123" data-tm-top="auto" data-tm-bottom="0" data-tm-left="auto" data-tm-right="300" data-tm-opacity="1" style="background-image: url(&quot;assets/images/shape/about-01.png&quot;); opacity: 1; height: 123px; width: 76px; inset: auto 300px 0px auto;"></span>-->

<!--        <span class="floating-object-2 tm-animation-random d-none-1799" data-tm-bg-img="assets/images/shape/causes-02.png" data-tm-width="95" data-tm-height="90" data-tm-top="290" data-tm-bottom="auto" data-tm-left="auto" data-tm-right="140" data-tm-opacity="1" style="background-image: url(&quot;assets/images/shape/causes-02.png&quot;); opacity: 1; height: 90px; width: 95px; inset: 290px 140px auto auto;"></span>-->
<!--      </div>-->
<!--    </section>-->


<!-- Section: Divider -->
<section>
  <div class="container">
    <div class="tm-sc-section-title section-title text-center ">
      <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-6 col-xxl-5">
          <div class="title-wrapper mb-1">
            <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Activities</h6>
            <h2 class="title mb-0">Join Our Programs</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="project-tab-style1">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link  active" id="recycling-tab"  href="for-families" role="tab" aria-controls="recycling" aria-selected="true"><img src="assets/images/icons/For Families.png" alt="Image"> <br>For Families</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="waterrefine-tab"  href="for-youth" role="tab" aria-controls="waterrefine" aria-selected="false"><img src="assets/images/icons/For Youth.png" alt="Image"> <br>For Youth</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="saveanimals-tab"  href="for-children" role="tab" aria-controls="saveanimals" aria-selected="false"><img src="assets/images/icons/For Children.png" alt="Image"> <br>For Children</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="eco-system-tab"  href="cultural-education-for-children" role="tab" aria-controls="eco-system" aria-selected="false"><img src="assets/images/icons/Gita Life Course.png" alt="Image"> <br>Cultural Education</a>
              </li>
              <!-- <li class="nav-item" role="presentation">
                <a class="nav-link" id="solarenergy-tab" data-bs-toggle="tab" href="#solarenergy" role="tab" aria-controls="solarenergy" aria-selected="false"><img src="assets/images/icons/Cultural Education.png" alt="Image"> <br>Cultural Education For Students</a>
              </li> -->
            </ul>
            <!-- <div class="tab-content p-0" id="myTabContent">
              <div class="tab-pane fade" id="eco-system" role="tabpanel" aria-labelledby="eco-system-tab">
                <div class="row">
                  <div class="col-lg-12 col-xl-6">
                    <div class="layer-bg-wrapper-current-style1">
                      <img class="mb-25 w-100" src="assets/images/photos/service-tab1.jpg" alt="Image">
                      <div class="font-size-18 text-white pb-25 pl-lg-20">For any inquiries call the hotline: <span>666 888 0000</span></div>
                      <div class="img-bg-layer1 bg-img-cover" data-tm-bg-img="assets/images/bg/divider-bg4.jpg"></div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-5">
                    <div class="tab-content-inner pt-70 pt-lg-40 pr-md-30 pr-xs-15 pl-50 pl-lg-20 pr-lg-20 pl-md-30 pl-xs-15">
                      <h3 class="font-size-40 font-weight-500 mt-0 mb-40">How Drones Can Save Rainforests</h3>
                      <p class="font-size-18 mb-40">There are many variations of passages of available but the majority have suffered alteration in some form, by injected humou.</p>
                      <ul class="unordered-list-current-style1 mb-50">
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Lorem Ipsum is not simply random text</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> If you are going to use a passage</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Making this the first true generator on the Internet</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Various versions have evolved over the years</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade show active" id="recycling" role="tabpanel" aria-labelledby="recycling-tab">
                <div class="row">
                  <div class="col-lg-12 col-xl-6">
                    <div class="layer-bg-wrapper-current-style1">
                      <img class="mb-25 w-100" src="assets/images/photos/service-tab1.jpg" alt="Image">
                      <div class="font-size-18 text-white pb-25 pl-lg-20">For any inquiries call the hotline: <span>666 888 0000</span></div>
                      <div class="img-bg-layer1 bg-img-cover" data-tm-bg-img="assets/images/bg/divider-bg4.jpg"></div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-5">
                    <div class="tab-content-inner pt-70 pt-lg-40 pr-md-30 pr-xs-15 pl-50 pl-lg-20 pr-lg-20 pl-md-30 pl-xs-15">
                      <h3 class="font-size-40 font-weight-500 mt-0 mb-40">How Drones Can Save Rainforests</h3>
                      <p class="font-size-18 mb-40">There are many variations of passages of available but the majority have suffered alteration in some form, by injected humou.</p>
                      <ul class="unordered-list-current-style1 mb-50">
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Lorem Ipsum is not simply random text</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> If you are going to use a passage</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Making this the first true generator on the Internet</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Various versions have evolved over the years</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="waterrefine" role="tabpanel" aria-labelledby="waterrefine-tab">
                <div class="row">
                  <div class="col-lg-12 col-xl-6">
                    <div class="layer-bg-wrapper-current-style1">
                      <img class="mb-25 w-100" src="assets/images/photos/service-tab1.jpg" alt="Image">
                      <div class="font-size-18 text-white pb-25 pl-lg-20">For any inquiries call the hotline: <span>666 888 0000</span></div>
                      <div class="img-bg-layer1 bg-img-cover" data-tm-bg-img="assets/images/bg/divider-bg4.jpg"></div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-5">
                    <div class="tab-content-inner pt-70 pt-lg-40 pr-md-30 pr-xs-15 pl-50 pl-lg-20 pr-lg-20 pl-md-30 pl-xs-15">
                      <h3 class="font-size-40 font-weight-500 mt-0 mb-40">How Drones Can Save Rainforests</h3>
                      <p class="font-size-18 mb-40">There are many variations of passages of available but the majority have suffered alteration in some form, by injected humou.</p>
                      <ul class="unordered-list-current-style1 mb-50">
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Lorem Ipsum is not simply random text</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> If you are going to use a passage</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Making this the first true generator on the Internet</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Various versions have evolved over the years</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="saveanimals" role="tabpanel" aria-labelledby="saveanimals-tab">
                <div class="row">
                  <div class="col-lg-12 col-xl-6">
                    <div class="layer-bg-wrapper-current-style1">
                      <img class="mb-25 w-100" src="assets/images/photos/service-tab1.jpg" alt="Image">
                      <div class="font-size-18 text-white pb-25 pl-lg-20">For any inquiries call the hotline: <span>666 888 0000</span></div>
                      <div class="img-bg-layer1 bg-img-cover" data-tm-bg-img="assets/images/bg/divider-bg4.jpg"></div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-5">
                    <div class="tab-content-inner pt-70 pt-lg-40 pr-md-30 pr-xs-15 pl-50 pl-lg-20 pr-lg-20 pl-md-30 pl-xs-15">
                      <h3 class="font-size-40 font-weight-500 mt-0 mb-40">How Drones Can Save Rainforests</h3>
                      <p class="font-size-18 mb-40">There are many variations of passages of available but the majority have suffered alteration in some form, by injected humou.</p>
                      <ul class="unordered-list-current-style1 mb-50">
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Lorem Ipsum is not simply random text</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> If you are going to use a passage</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Making this the first true generator on the Internet</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Various versions have evolved over the years</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="solarenergy" role="tabpanel" aria-labelledby="solarenergy-tab">
                <div class="row">
                  <div class="col-lg-12 col-xl-6">
                    <div class="layer-bg-wrapper-current-style1">
                      <img class="mb-25 w-100" src="assets/images/photos/service-tab1.jpg" alt="Image">
                      <div class="font-size-18 text-white pb-25 pl-lg-20">For any inquiries call the hotline: <span>666 888 0000</span></div>
                      <div class="img-bg-layer1 bg-img-cover" data-tm-bg-img="assets/images/bg/divider-bg4.jpg"></div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-5">
                    <div class="tab-content-inner pt-70 pt-lg-40 pr-md-30 pr-xs-15 pl-50 pl-lg-20 pr-lg-20 pl-md-30 pl-xs-15">
                      <h3 class="font-size-40 font-weight-500 mt-0 mb-40">How Drones Can Save Rainforests</h3>
                      <p class="font-size-18 mb-40">There are many variations of passages of available but the majority have suffered alteration in some form, by injected humou.</p>
                      <ul class="unordered-list-current-style1 mb-50">
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Lorem Ipsum is not simply random text</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> If you are going to use a passage</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Making this the first true generator on the Internet</li>
                        <li><img class="mr-20" src="assets/images/icons/1.png" alt="Image"> Various versions have evolved over the years</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tm-floating-objects">
    <span class="floating-object-1 tm-animation-spin d-none-1799" data-tm-bg-img="assets/images/about/about4.png" data-tm-width="161" data-tm-height="166" data-tm-top="auto" data-tm-bottom="185" data-tm-left="auto" data-tm-right="215" data-tm-opacity="1"></span>
    <span class="floating-object-1 tm-animation-floating z-index--1 d-none d-xl-block" data-tm-bg-img="assets/images/shape/about-01.png" data-tm-width="76" data-tm-height="123" data-tm-top="140" data-tm-bottom="auto" data-tm-left="220" data-tm-right="auto" data-tm-opacity="1"></span>
    <span class="floating-object-2 tm-animation-random d-none-1799" data-tm-bg-img="assets/images/shape/causes-02.png" data-tm-width="95" data-tm-height="90" data-tm-top="450" data-tm-bottom="auto" data-tm-left="auto" data-tm-right="110" data-tm-opacity="1"></span>
  </div>
</section>




<!-- Section: Divider -->
<section class="bg-no-repeat bg-img-cover" data-tm-bg-img="assets/images/bg/annadana-hall.jpg" style="background-size:cover; background-position: center center;">
  <div class="section-content">
    <div class="container pt-0">
      <div class="row text-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8 m-auto">
          <div class="bg-theme-colored2 icon-current-style1 d-inline-block mb-30"><img src="assets/images/icons/Annadana.png" alt="Icon-Image"></div>
          <h2 class=" font-weight-500  mt-0 mb-40 pb-1" style="background:#fff">Annadanam Mahadanam</h2>
          <a href="annadana-seva" class="btn btn-theme-colored2 btn-outline btn-lg btn-round font-size-14 font-weight-500 text-uppercase letter-spacing-1 pt-20 pb-20">Support Us in Feeding Needy and Temple Visitors.</a>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- Section: News -->
     <section data-tm-bg-color="#f5f5f4">
      <div class="container pb-110">
        <div class="section-content">
          <div class="row">
            <div class="col-lg-12 offset-xl-0 col-xxl-4 offset-xxl-0">
              <div class="tm-sc-section-title section-title text-start mb-0 mb-xl-60 mb-xl-50 pr-60 pr-lg--0">
                <div class="title-wrapper mb-0">
                  <h6 class="subtitle line-shape-bottom text-center line-shape-center text-theme-colored1">From The Blog</h6>
                 
                </div>
              </div>
            </div>
            <div class="col-xxl-8">
              <div class="blog-carousel-current-theme-style1">
                <div class="tm-owl-carousel-2col owl-carousel owl-theme" data-nav="true" data-stagePadding="40">
                  <?php if(!empty($blog)){ 
                    foreach($blog as $post){ ?>
                   
                <div class="blog-current-theme-style2">
                    <article class="post">
                      <div class="entry-header">
                        <div class="post-thumb">
                          <div class="post-thumb-inner">
                            <div class="thumb">
                              <img class="w-100" src="<?php echo BLOG_PHOTO_UPLOAD_PATH.$post->post_image; ?>" alt="Image">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="entry-content bg-white">
                        <div class="blog-meta mb-15">
                          <span class="date-type">
                            <i class="far fa-clock text-theme-colored2"></i> <?php echo $post->created_at; ?>
                          </span>
                        </div>
                        <h4 class="entry-title mt-0 mb-0">
                          <a href="blog/post/<?php echo $post->page_slug; ?>"><?php echo $post->title; ?></a>
                        </h4>
                        <div class="clearfix"></div>
                      </div>
                    </article>
                  </div>
                  <?php } } ?>
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- Section: Testimonial -->
<!-- <section class="" data-tm-bg-color="#f5f5f4">
  <div class="container-fluid pl-0 pr-0 pr-sm-15 pl-sm-15 pb-md-40">
    <div class="tm-sc-section-title section-title text-center mb-50">
      <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
          <div class="title-wrapper mb-1">
            <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Our Testimonials</h6>
            <h2 class="title mb-0">What Visitors Say</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="tm-sc-testimonials testimonial-current-theme-style1">
        <div class="tm-owl-carousel-2col" data-stagePadding="370" data-laptop="1">
          <div class="tm-testimonial testimonials">
            <div class="testimonial-inner">
              <div class="testimonial-text-holder">
                <div class="author-text">I was very impresed by the kologi service lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia.</div>
                <div class="icon">
                  <img class="icon-img" src="assets/images/icons/testi01.png" alt="Image">
                </div>
              </div>
              <div class="testimonial-author-details">
                <div class="testimonial-image-holder">
                  <div class="author-thumb"> <img width="57" height="57" src="assets/images/testimonials/1.png" class="" alt="Image"></div>
                </div>
                <div class="testimonial-author-info-holder">
                  <h5 class="name">Jessica Brown</h5>
                  <span class="job-position">Customer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="tm-testimonial testimonials">
            <div class="testimonial-inner">
              <div class="testimonial-text-holder">
                <div class="author-text">I was very impresed by the kologi service lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia.</div>
                <div class="icon">
                  <img class="icon-img" src="assets/images/icons/testi01.png" alt="Image">
                </div>
              </div>
              <div class="testimonial-author-details">
                <div class="testimonial-image-holder">
                  <div class="author-thumb"> <img width="57" height="57" src="assets/images/testimonials/2.png" class="" alt="Image"></div>
                </div>
                <div class="testimonial-author-info-holder">
                  <h5 class="name">Mike Hardson</h5>
                  <span class="job-position">Customer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="tm-testimonial testimonials">
            <div class="testimonial-inner">
              <div class="testimonial-text-holder">
                <div class="author-text">I was very impresed by the kologi service lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia.</div>
                <div class="icon">
                  <img class="icon-img" src="assets/images/icons/testi01.png" alt="Image">
                </div>
              </div>
              <div class="testimonial-author-details">
                <div class="testimonial-image-holder">
                  <div class="author-thumb"> <img width="57" height="57" src="assets/images/testimonials/3.png" class="" alt="Image"></div>
                </div>
                <div class="testimonial-author-info-holder">
                  <h5 class="name">Saral Albert</h5>
                  <span class="job-position">Customer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="tm-testimonial testimonials">
            <div class="testimonial-inner">
              <div class="testimonial-text-holder">
                <div class="author-text">I was very impresed by the kologi service lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia.</div>
                <div class="icon">
                  <img class="icon-img" src="assets/images/icons/testi01.png" alt="Image">
                </div>
              </div>
              <div class="testimonial-author-details">
                <div class="testimonial-image-holder">
                  <div class="author-thumb"> <img width="57" height="57" src="assets/images/testimonials/4.png" class="" alt="Image"></div>
                </div>
                <div class="testimonial-author-info-holder">
                  <h5 class="name">John Smith</h5>
                  <span class="job-position">Customer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="tm-testimonial testimonials">
            <div class="testimonial-inner">
              <div class="testimonial-text-holder">
                <div class="author-text">I was very impresed by the kologi service lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia.</div>
                <div class="icon">
                  <img class="icon-img" src="assets/images/icons/testi01.png" alt="Image">
                </div>
              </div>
              <div class="testimonial-author-details">
                <div class="testimonial-image-holder">
                  <div class="author-thumb"> <img width="57" height="57" src="assets/images/testimonials/5.png" class="" alt="Image"></div>
                </div>
                <div class="testimonial-author-info-holder">
                  <h5 class="name">David Cooper</h5>
                  <span class="job-position">Customer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->




<!-- Section: Featured Causes -->
<section>
  <div class="container pt-30">
    <div class="row">
      <div class="col-lg-11 offset-lg-1">
        <div class="featured-causes-item-current-style1 bg-white position-relative z-index-2">
          <div class="thumb">
            <!-- <img style="border-radius: 6%" width="300px" src="<?php echo SEVA_PAGE_BANNER_PATH.$this->db->where('page_slug','care-for-cows')->get('sevas_page')->row()->seva_page_banner; ?>" alt="Image"> -->
            <img style="border-radius: 6%" width="300px" src="assets/images/bg/care-for-cows.jpg" alt="Image">
          </div>
          <div class="content">
            <div class="row">
              <div class="col-lg-10 col-xl-10 mx-auto">
                <!-- <div class="">Goal: <span class="text-theme-colored1 font-weight-500">500.00 INR</span></div> -->
                <h3 class="font-weight-400 mt-1 mb-20 pb-1">Help us Protect Cows</h3>
                <p class="font-size-18">Cow Protection doesn't just mean "Not Killing Cows”, rather it is "Serving Cows to make them Happy." Join us in truly protecting 200 desi cows, who are living happily and fearlessly at Hare Krishan Mandir Ahmedabad.</p>
                <a href="gau-seva" class="btn btn-outline-theme-colored1 btn-outline btn-round font-size-14 font-weight-500 text-uppercase letter-spacing-1 mb-md-20 pt-20 pr-40 pb-20 pl-40">Donate now</a>
              </div>
              <!-- <div class="col-lg-5 col-xl-3 offset-xl-1">
                <div class="tm-sc-pie-chart pie-chart-current-style1 mt-30">
                  <div class="pie-chart" data-bar-color="#f7b135" data-track-color="#f5f5f4" data-scale-color="#8224e3" data-scale-length="0" data-line-cap="round" data-line-width="5" data-size="215" data-tm-width="215" data-tm-height="215" data-percent="66">
                    <span class="percent"></span>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tm-floating-objects">
    <span class="floating-object-2 tm-animation-floating d-none-1799" data-tm-bg-img="assets/images/shape/flower.png" data-tm-width="361" data-tm-height="536" data-tm-top="-230" data-tm-bottom="auto" data-tm-left="0" data-tm-right="auto" data-tm-opacity="1"></span>
    <span class="floating-object-1 z-index-1 d-none-1799" data-tm-bg-img="assets/images/shape/funfact-02.png" data-tm-width="373" data-tm-height="648" data-tm-top="auto" data-tm-right="20" data-tm-bottom="-30" data-tm-left="auto" data-tm-opacity="1"></span>
  </div>
</section>



<!-- Section: Divider -->
<!-- <section class="bg-no-repeat bg-img-cover" data-tm-bg-img="assets/images/bg/divider-bg.jpg">
  <div class="section-content">
    <div class="container pt-110 pt-md-20 pb-110 pb-md-80">
      <div class="row align-items-center">
        <div class="col-lg-8 col-xl-7 col-xxl-6 pr-100 pr-md--0 mb-md-30">
          <h2 class="font-size-44 font-weight-400 mt-0 mb-0 text-center text-lg-start">Don't Throw Away Recycle for Another Day!</h2>
        </div>
        <div class="col-lg-4 col-xl-5 col-xxl-6 text-center text-lg-end">
          <a href="page-contact.html" class="btn btn-outline-dark btn-outline btn-lg btn-round font-size-14 font-weight-500 text-uppercase letter-spacing-1 text-theme-colored3 text-hover-theme-colored2 pt-20 pb-20">Join our team</a>
        </div>
      </div>
    </div>
  </div>
</section> -->