<section class="inner-header divider " data-bg-img="assets/images/bg/banner-bg.png" style="background-image: url('assets/images/bg/banner-bg.png'); background-position: bottom left;">
      <div class="container  pt-40">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-12">
              <h2 class=" text-center font-36">Festivals</h2>
              <!-- <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active">Festivals</li>
              </ol> -->
            </div>
          </div>
        </div>
      </div>      
    </section>

    <section>
      <div class="container pt-70 pb-40">
        <div class="section-content">
          <div class="row  display-flex">
            <?php foreach($festivals as $festival){ ?>
          <div class="col-sm-6 col-md-4">
              <div class="event-list  maxwidth500 mb-30 border-1px">
                <div class="thumb">
                  <img src="<?php echo SEVA_PAGE_BANNER_PATH.$festival->seva_page_banner; ?>" alt="" class="img-fullwidth" height="280px">
                  <?php $date = date('Y-M-d',strtotime($festival->celebration_date));  $exp_date = explode('-',$date); ?>
                  <!-- <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                    <ul>
                      <li class="font-16  font-weight-600 border-bottom"><?php echo $exp_date[2]; ?></li>
                      <li class="font-12  text-uppercase"><?php echo $exp_date[1]; ?></li>
                    </ul>
                  </div> -->
                </div>
                <div class="event-list-details  bg-white clearfix p-20 pt-10 pb-20">
                  <h4 class="font-20 text-uppercase"><a href="<?php echo $festival->page_slug; ?>"><?php echo $festival->sevas_page_title; ?></a></h4>
                  <ul class="list-inline font-weight-600">
                    <li><i class="fa fa-clock-o text-theme-colored"></i> <?php echo $exp_date[2].' '.$exp_date[1].' '. date('h:i a',strtotime($festival->celebration_time)); ?></li>
                    <!-- <li> <i class="fa fa-map-marker text-theme-colored"></i> 25 Newyork City.</li> -->
                  </ul>
                  <p class="mt-15"><?php echo $festival->celebration_details; ?></p> <a href="<?php echo $festival->page_slug; ?>" class="btn btn-default btn-theme-colored mt-10 font-16 btn-sm">Offer Seva <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                </div>
              </div>
            </div>
           <?php } ?>
          </div>
        </div>
      </div>

  
      </div>

      
      </div>
    </section>


 

