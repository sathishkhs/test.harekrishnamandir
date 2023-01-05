<style>
table{
  border: solid 1px;
}
td{
  border: 1px solid;
}
  </style>

<section class="inner-header divider " data-bg-img="assets/images/bg/banner-bg.png" style="background-image: url('assets/images/bg/banner-bg.png'); background-position: bottom left;">
      <div class="container  pt-40">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-12">
              <h2 class=" text-center font-36"><?php echo $page_items->sevas_page_title; ?></h2>
              <!-- <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active"><?php echo $page_items->page_title; ?></li>
              </ol> -->
            </div>
          </div>
        </div>
      </div>      
    </section>

<!-- Section: Causes -->
<section>
  <div class="container pt-20 pb-40">
    <div class="row mtli-row-clearfix">
      <?php if($page_items->banner_type == 0){ ?>
      <div class="col-sm-6 col-md-8 col-lg-8">
        <div class="causes bg-white maxwidth500 mb-30">
          <div class="thumb">
            <img src="<?php echo SEVA_PAGE_BANNER_PATH . $page_items->seva_page_banner; ?>" alt="" class="img-fullwidth">
          </div>
          
        </div>
      </div>
      <?php }elseif($page_items->banner_type == 1){  ?>

        
        <div class="col-sm-6 col-md-8 col-lg-8">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators ">
              <?php $count = count($gallery);  
              for($i=0; $i < $count; $i++ ){ ?>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i;?>" class="carousel-indicators-round <?php echo ($i == 0) ? 'active' : '' ?>" aria-current="true" aria-label="Slide 1"></button>
              <?php } ?>
              <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
            </div>
            <div class="carousel-inner">
            <?php foreach ($gallery as $key => $image) {  ?>
              <div class="carousel-item <?php echo ($key == 0) ? 'active' : '' ?>">
                <a href="">
                <img src="<?php echo GALLERY_UPLOAD_PATH . $image->gallery_img_path; ?>" class="d-block w-100" style="height: 500px; object-fit: cover" alt="...">
                </a>
              </div>
            
              <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="fa fa-arrow-alt-circle-left" style="color:#f7b135 ; font-size: 22px" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="fa fa-arrow-alt-circle-right" style="color:#f7b135 ; font-size: 22px" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      <?php } ?>
          
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="sidebar sidebar-right mt-sm-30">
       
          <div class="widget">
            <h5 class="widget-title line-bottom">Festival Schedule</h5>
            <p><?php echo $page_items->schedule_content; ?></p>
          </div>
         
        </div>
      </div>

    </div>



   



    <div class="row">
      <div class="col-sm-12">
      <div class="causes-details border-1px bg-white clearfix p-20 pt-10 pb-20">
            <h4 class="font-20 text-uppercase"><?php echo $page_items->sevas_page_title; ?></h4>
            <p class="mt-15" ><?php echo $page_items->seva_page_desc_top; ?>  </p>
            <!-- <button type="button" id="more_less_btn" class="btn btn-xs btn-theme-colored btn-default read_more">Read More</button> -->
          </div>
        <div class="container">
          <div class="row">
         
            <?php if (!empty($sevas)) { ?>
              <?php foreach ($sevas as $key => $seva) {
                ?> 
            <div class="col-md-6 col-lg-4 mt-4">
              <div class="causes-item-current-style1 position-relative z-index-2">
                <div class="causes-item mb-lg-30">
                  <div class="causes-thumb">
                    <img src="<?php echo SEVAS_PHOTO_UPLOAD_PATH . $seva->seva_image; ?>" alt="Image" class="w-100">
                    <button type="button"  data-name="<?php echo $seva->seva_name; ?>" data-amount="<?php echo $seva->seva_amount; ?>" data-bs-toggle="modal" data-bs-target="#myModal" onclick="seva_amount(this.getAttribute('data-amount'),this.getAttribute('data-name'))" class="btn btn-donate-now">Donate Now</button>
                  </div>
                  <div class="causes-details pt-1 px-4" style="background:#eeeeee">
                    <div class="donation-goal mb-1">
                      <div class="raised">Amount: <span class="text-theme-colored1 font-weight-500"><?php echo !empty($seva->seva_amount) ? $seva->seva_amount : '<input type="number" id="seva_amount" value="">'; ?></span></div>
                    </div>
                    <h6 class="causes-title mb-0"><?php echo $seva->seva_name; ?></h6>
                    <p><?php echo $seva->description; ?></p>
                  </div>
                 
                </div>
              </div>
            </div>

            <?php 
                } 
              }
            
            ?>

    </div>


  </div>
</section>

<section class="container mb-4">
  <div class="row">
  <?php if(!empty($page_items->video_link_1) || !empty($page_items->video_link_2) || !empty($page_items->video_link_3)){ ?>              
                <div class="tm-sc-section-title section-title mb-0 mb-md-50">
                    <div class="title-wrapper mb-0 text-center mb-4">
                        <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1  ">Videos</h6>

                    </div>
                </div>
                <?php } ?>
                <?php if(!empty($page_items->video_link_1)){ ?>
                <div class="col-md-4">
                <iframe width="426" height="240" src="https://www.youtube.com/embed/<?php echo $page_items->video_link_1; ?>" title="Hare Krishna Mandir" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <?php } ?>
                <?php if(!empty($page_items->video_link_2)){ ?>
                <div class="col-md-4">
                <iframe width="426" height="240" src="https://www.youtube.com/embed/<?php echo $page_items->video_link_2; ?>" title="Hare Krishna Mandir" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <?php } ?>
                <?php if(!empty($page_items->video_link_3)){ ?>
                <div class="col-md-4">
                <iframe width="426" height="240" src="https://www.youtube.com/embed/<?php echo $page_items->video_link_3; ?>" title="Hare Krishna Mandir" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <?php } ?>
              
  </div>

</section>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="role="document"">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"><?php echo $page_items->sevas_page_title; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      
      <div class="modal-body">
          
            <div class="section-content">
              <div class="container">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <h3 class="mt-0 line-bottom">Offer Seva<span class="font-weight-300"> Now!</span></h3>

                  <!-- ===== START: Paypal Both Onetime/Recurring Form ===== -->
                  <form id="popup_paypal_donate_form_onetime_recurring" action="<?php echo base_url($slug); ?>" id="offerseva_form" method="POST" enctype="multipart/form-data">
                    <input name="table_name" type="hidden" value="payments">
                    <input name="festival" type="hidden" value="<?php echo $page_items->page_slug; ?>">
                    <input type="hidden" name="donation_type" value="<?php if($payment_type == 0) {echo 'Charitable Programs';}elseif($payment_type == 1){ echo 'Nitya Sevas';}; ?>">
                    <input type="hidden" name="currency" value="INR">

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Full Name</label>
                        <input id="full_name" type="text" name="full_name" value="" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <input id="phone_number" type="text" name="phone_number" value="" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input id="email" type="email" name="email" value="" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Choice Amount</label>
                        <input id="amount" type="text" name="amount" value="" class="form-control">
                      </div>
                    
                     
                    </div>
                    <div class="row d-none">
                      <div class="form-group col-md-6">
                        <label>Address</label>
                        <input id="city" type="hidden" name="city" value="NULL" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Pincode</label>
                        <input id="pincode" type="hidden" name="pincode" value="NULL" class="form-control">
                      </div>
                      </div>
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group mb-20">
                          <div>
                            <label>Seva you are offering: </label>
                            <input id="seva_name" name="seva_name" value="" class="form-control" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-12">
                      <label>Pan Number <small style="font-size: 11px">(Optional for 80G certificate)</small></label>
                        <input id="pan_number" type="text" name="pan_number" value="" class="form-control">
                       
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group mb-20">
                          <div>
                            <label><strong>Seva Amount: &#8377;</strong><span id="custom_other_amount"> </span> </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="checkbox-group">
                                <div class="formbuilder-checkbox">
                                    <input name="address_check" access="false" id="address_check" value="yes" type="checkbox">
                                    <label for="80G-0" class="thm-color1"> I like to receive Goodies/Best Wishes to my address</label>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row address_div">
                    <input name="address" type="hidden" value="NULL">
                      <input name="city" type="hidden" value="NULL">
                      <input name="pincode" type="hidden" value="NULL">
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" data-loading-text="Please wait...">Donate Now</button>
                      </div>
                    </div>

                  </form>


                </div>
              </div>
              </div>
            </div>
       
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>



<div class="col-sm-12 col-md-12 mx-auto">
<!--<div class="form-body">-->
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
<!--                    <h3 class="text-center">Akshayachaitanya Donation Page</h3>-->
<!--                    <h4>Select any payment gateway to complete payment.</h4>-->
                    
                    <form id="razorpay-form" action="<?php echo base_url(); ?>seva_page/save_payment" method="POST">
                        <script type="text/javascript"  src="https://checkout.razorpay.com/v1/checkout.js"
                        data-buttontext=""
                        data-key="<?php echo $keyId; ?>"
                        data-amount="<?php echo $amount * 100; ?>"
                        data-currency="INR"
                        data-name="<?php echo $this->config->item('company_name') ?>"
                        data-image="<?php echo SETTINGS_UPLOAD_PATH . $settings->LOGO_IMAGE ?>"
                        data-description="<?php echo $this->config->item('description') ?>"
                        data-prefill.name="<?php echo $full_name ?>"
                        data-prefill.email="<?php echo $email ?>"
                        data-prefill.contact="<?php echo $phone_number ?>"
                        data-prefill.pan="<?php echo $pan_number ?>"
                        data-notes.pan="<?php echo $pan_number ?>"
                        data-notes.shopping_order_id="<?php echo $notes['razorpay_order_id']; ?> "
                        data-modal.confirm_close = 'true'
                        data-modal.ondismiss="this.modal_close()"
                        <?php if ($displayCurrency !== 'INR') { ?>
                        data-display_amount="<?php echo $display_amount ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?>
                        data-display_currency="<?php echo $display_currency ?>" <?php } ?>
                        data-redirect = 'true'
                        data-callback_url = "<?php echo base_url(); ?>seva_page/save_payment/<?php echo $insert_id .'/'.$table_name; ?>"
                       
                        >

                      
                        </script>
                      
                      
                      
                    </form>
                    
                
            </div>
        </div>
        </div>
    <!--</div>-->
</div>
</div>

<style>
  .razorpay-payment-button{
    visibility: hidden;
  }
</style>

<script type="text/javascript" >

$('body').on('hidden.bs.modal', function () {
if($('.modal.show').length > 0)
{
    $('body').addClass('modal-open');
}
});
$('.modal').css('overflow-y', 'auto');
               
$('#address_check').on('click', function() {
        if ($(this).is(":checked")) {
         var html = '<div class="form-group col-md-12">'
             html +=  '<label>Address*</label>'
             html +=   '<input id="address" type="text" name="address" value="" class="form-control" required>'
             html +=   '</div>'
             html +=   '<div class="form-group col-md-12">'
             html +=   '<label>Address 2</label>'
             html +=   '<input id="address2" type="text" name="address2" value="" class="form-control">'
             html +=   '</div>'
             html +=   '<div class="form-group col-md-6">'
             html +=   '<label>City*</label>'
             html +=   '<input id="city" type="text" name="city" value="" class="form-control">'
             html +=   '</div>'
             html +=   '<div class="form-group col-md-6">'
             html +=   '<label>PinCode*</label>'
             html +=   '<input id="pincode" type="text" name="pincode" value="" class="form-control">'
             html +=   '</div>'
             html +=   '<div class="form-group col-md-6">'
             html +=   '<label>State*</label>'
             html +=   '<input id="state" type="text" name="state" value="" class="form-control">'
             html +=   '</div>'
            $('.address_div').html(html)
        } else {
            html = '<input id="address" type="hidden" name="address" value="---" class="form-control">'
            $('.address_div').html(html) 
        }
    })


    window.onload = function(){
    var button = document.getElementById('clickButton');
    <?php if(!empty($keyId) && !empty($razorpay_order_id)){ ?>
    $('#razorpay-form').submit();
    <?php } ?>
    $('#modal-close').on('click',function(){
      
            //  window.location.replace("donate");
             window.location.href = '';
        
    });


         
   
}

$("#popup_paypal_donate_form_onetime_recurring").validate({
        // Specify validation rules

        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            full_name: "required",
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            phone_number: {
                required: true,
                minlength: 10,
                maxlength: 12
            },
          
            amount: {
                required: true
            },
            // payble_amount: required
        },
        // Specify validation error messages
        messages: {
          full_name: "Please enter your Full Name",
          phone_number: {
                required: "Please provide a Mobile Number",
                minlength: "Your mobile number must be at least 10 characters long",
                maxlength: "Your mobile number must not be more than 12 characters length"
            },
            email: "Please enter a valid Email Address",
            pan_number: "please enter Pan Number",
            amount: "Please enter Amount",
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            var amount = $('#amount').val();
            if(amount == '' || amount < 600 ){
                alert('Amount cannot be less than ₹600')
            }else{
            form.submit();
            }
        }
    });



$(".number").keydown(function(event) {        
    k = event.which;
   
  if ((k >= 48 && k <= 57) || k == 8) {
 
  return true
    
  } else {
    event.preventDefault();
    return false;
  }

            
        })

function modal_close(){
    window.location.href = <?php echo $slug; ?>;
}

</script>