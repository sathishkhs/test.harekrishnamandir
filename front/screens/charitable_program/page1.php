<style>
li{
  margin-left: 20px;
}
h5{
  margin-bottom: 25px;
    margin-top: 0;
    font-size: 1.1rem;
    line-height: 1.1;
    position: relative;
    margin-bottom: 35px;
    padding-bottom: 10px;
}
h5:after {
    bottom: -10px;
    content: "";
    height: 4px;
    left: 0;
    position: absolute;
    width: 65px;
    background: #555;
}
</style>


<div class="container my-5">
  <div class="row">
    <div class="col-sm-12">

      <?php echo $page_items->text_below_banner;?>
    </div>
  </div>
    <div class="row">
        <div class="col-md-12 col-lg-6">
          <?php echo $page_items->left_description; ?>
        </div>

<div class="col-md-12 col-lg-6 bg-light order-first  order-lg-2 mb-3">


<div class="container pt-0">
<div class="container">
        <div class="modal-body">
          <section>
            <div class="section-content">
              <div class="container pt-1">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  
                  <h6 class="mt-0 line-bottom mb-3"><?php echo $page_items->form_heading; ?></h6>
                  <p>Avail tax exemption under Section 80G</p>

                  <!-- ===== START: Paypal Both Onetime/Recurring Form ===== -->
                  <form id="popup_paypal_donate_form_onetime_recurring" action=""  method="POST" enctype="multipart/form-data">
                      <?php if($this->config->item('payment_mode') == 'test'){ ?>
                      <input name="table_name" type="hidden" value="test_payments">
                      <?php } else{ ?>
                        <input name="table_name" type="hidden" value="payments">
                        <?php } ?>
                        <input type="hidden" name="donation_type" value="<?php if($payment_type == 0) {echo 'Charitable Programs';}elseif($payment_type == 1){ echo 'Nitya Sevas';}else{ echo 'festival';}; ; ?>">
                        <input name="seva_name" type="hidden" value="<?php echo $page_items->page_slug; ?>">
                        <input name="tally_head" type="hidden" value="<?php echo $page_items->tally_head; ?>">
                        <input name="seva_code" type="hidden" value="<?php echo $page_items->seva_code; ?>">
                        <input type="hidden" name="slug" value="<?php echo $page_items->page_slug; ?>">
                        <input type="hidden" name="festival" value="<?php echo $page_items->title; ?>">
                        <input type="hidden" name="currency" value="INR">
                        
                    <div class="row">
                       
                        <div class="form-group col-md-12 d-flex flex-wrap form-control p-0 border-0 mb-2">
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" checked id="one" name="radioamount" value="<?php echo $page_items->amount_1;?>" >
                                                <label class="form-check-label pl-10" for="one"> ₹<?php echo $page_items->amount_1 .  (!empty($page_items->amount_1_label) ? '&nbsp;-&nbsp;'. $page_items->amount_1_label  : '');?></label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="two" name="radioamount" value="<?php echo $page_items->amount_2; ?>" >
                                                <label class="form-check-label pl-10" for="two"> ₹<?php echo $page_items->amount_2 .  (!empty($page_items->amount_2_label) ? '&nbsp;-&nbsp;'. $page_items->amount_2_label  : ''); ?></label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="three" name="radioamount" value="<?php echo $page_items->amount_3; ?>" >
                                                <label class="form-check-label pl-10" for="three"> ₹<?php echo $page_items->amount_3 .  (!empty($page_items->amount_3_label) ? '&nbsp;-&nbsp;'. $page_items->amount_3_label  : ''); ?></label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="five" name="radioamount" value="<?php echo $page_items->amount_4; ?>">
                                                <label class="form-check-label pl-10" for="five"> ₹<?php echo $page_items->amount_4 .  (!empty($page_items->amount_4_label) ? '&nbsp;-&nbsp;'. $page_items->amount_4_label  : ''); ?></label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="seven" name="radioamount" value="<?php echo $page_items->amount_5; ?>" >
                                                <label class="form-check-label pl-10" for="seven"> ₹<?php echo $page_items->amount_5 .  (!empty($page_items->amount_5_label) ? '&nbsp;-&nbsp;'. $page_items->amount_5_label  : ''); ?></label> &nbsp;
                                            </div>

                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="other" name="radioamount" >
                                                <label class="form-check-label pl-10" for="other"> Choice amount</label> &nbsp;
                                               
                                            </div>


                                        </div>
                       
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label id="custom-text">Selected Amount<sup class="text-danger">*</sup></label>
                        <input id="amount" type="text" name="amount" value="" class="form-control" onkeypress="checkother()">
                      </div>
                      <div class="form-group col-md-6">
                        <label id="">Seva Date</label>
                        <input id="seva_date" type="date" name="seva_date" value="" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Full Name<sup class="text-danger">*</sup></label>
                        <input id="full_name" type="text" name="full_name" value="" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Phone Number<sup class="text-danger">*</sup></label>
                        <input type="hidden" id="country_code" name="country_code" value="+91">
                        <input id="phone_number" type="text" name="phone_number" value="" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Email Id<sup class="text-danger">*</sup></label>
                        <input id="email" type="email" name="email" value="" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                      <label>Pan Number <small style="font-size: 11px">(Optional for 80G certificate)</small></label>
                        <input id="pan_number" type="text" name="pan_number"  onkeyup="this.value = this.value.toUpperCase()" value="" class="form-control">
                       
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="checkbox-group">
                                <div class="formbuilder-checkbox">
                                    <input name="address_check" access="false" id="address_check" value="yes" type="checkbox">
                                    <label for="80G-0" class="thm-color1"> I would like to receive Goodies/Best Wishes to my address</label>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row address_div">
                      <input name="address" type="hidden" value="NULL">
                      <input name="city" type="hidden" value="NULL">
                      <input name="pincode" type="hidden" value="NULL">

                    </div>

                    <!-- <div class="row d-none">
                      <div class="form-group col-md-6">
                        <label>Address</label>
                        <input id="city" type="hidden" name="address" value="Null" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Pincode</label>
                        <input id="pincode" type="hidden" name="pincode" value="Null" class="form-control">
                      </div>
                    </div> -->
                   
                    <div class="row">
                      <!-- <div class="col-sm-12">
                        <div class="form-group mb-20">
                          <div>
                            <label>Seva you are offering: </label>
                            <input id="seva_name" name="seva_name" value="" class="form-control" readonly>
                          </div>
                        </div>
                      </div> -->
                      <!-- <div class="col-sm-12">
                        <div class="form-group mb-20">
                          <div>
                            <label><strong>Seva Amount: &#8377;</strong><span id="custom_other_amount"> </span> </label>
                          </div>
                        </div>
                      </div> -->
                    </div>

                    <div class="col-sm-4 mx-auto">
                      <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-dark btn-theme-colored2 mt-10 pl-30 pr-30" data-loading-text="Please wait...">Donate Now</button>
                      </div>
                    </div>
                    <div class="col-sm-8 mx-auto text-center">
                           <!-- <small> Avail tax exemption under Section 80G</small> -->
                        </div>
                  </form>


                </div>
              </div>
              </div>
            </div>
        </div>
        </div>
</div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php echo $page_items->bottom_description; ?>
        </div>
    </div>
</div>
<section>

    <div class="container pt-2  pb-0 mt-30">
      <div class="section-content">
        <div class="row ">

          <?php if (!empty($page_items->video_link_1) || !empty($page_items->video_link_2) || !empty($page_items->video_link_3)) { ?>
            <div class="tm-sc-section-title section-title mb-0 mb-md-50">
              <div class="title-wrapper mb-0 text-center">
                <h6 class="subtitle line-shape-bottom text-theme-colored1 line-shape-center ">Videos</h6>

              </div>
            </div>
          <?php } ?>
          <?php if(!empty($page_items->video_link_1)){ ?>
                <div class="col-md-4 mt-3">
                <iframe width="426" height="240" src="https://www.youtube.com/embed/<?php echo $page_items->video_link_1; ?>" title="Hare Krishna Mandir" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <?php } ?>
                <?php if(!empty($page_items->video_link_2)){ ?>
                <div class="col-md-4 mt-3">
                <iframe width="426" height="240" src="https://www.youtube.com/embed/<?php echo $page_items->video_link_2; ?>" title="Hare Krishna Mandir" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <?php } ?>
                <?php if(!empty($page_items->video_link_3)){ ?>
                <div class="col-md-4 mt-3">
                <iframe width="426" height="240" src="https://www.youtube.com/embed/<?php echo $page_items->video_link_3; ?>" title="Hare Krishna Mandir" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <?php } ?>



        </div>
      </div>
    </div>
  </section>


<!-- <div class="col-sm-12 col-md-12 mx-auto">

    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">

                    
                    <form id="razorpay-form" action="<?php echo base_url(); ?>charitable_programs/save_payment" method="POST">
                        <script type="text/javascript"  src="https://checkout.razorpay.com/v1/checkout.js"
                        data-buttontext=""
                        data-key="<?php echo $keyId; ?>"
                        data-amount="<?php echo $amount * 100; ?>"
                        data-currency="INR"
                        data-name="<?php echo $this->config->item('name') ?>"
                        data-image="<?php echo SETTINGS_UPLOAD_PATH . $settings->LOGO_IMAGE ?>"
                        data-description="<?php echo $this->config->item('description') ?>"
                        data-prefill.name="<?php echo $full_name ?>"
                        data-prefill.email="<?php echo $email ?>"
                        data-prefill.contact="<?php echo $phone_number ?>"
                        data-prefill.pan="<?php echo $pan_number ?>"
                        data-notes.pan="<?php echo $pan_number ?>"
                        data-notes.shopping_order_id="<?php echo $notes['razorpay_order_id']; ?> "
                        data-modal.confirm_close = 'true'
                        data-modal.ondismiss=function(){alert('close')}
                        <?php if ($displayCurrency !== 'INR') { ?>
                        data-display_amount="<?php echo $display_amount ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?>
                        data-display_currency="<?php echo $display_currency ?>" <?php } ?>
                        data-redirect = 'true'
                        data-callback_url = "<?php echo base_url(); ?>charitable_programs/save_payment/<?php echo $insert_id .'/'.$table_name; ?>"
                    
                        >

                      
                        </script>
                      
                      
                       
                    </form>
                    
                
            </div>
        </div>
        </div>

</div>
</div> -->
<style>
  .razorpay-payment-button{
    visibility: hidden;
  }
</style>

<button id="rzp-button1" class="d-none"></button>
<div id="failed-form"></div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<!-- 
<script type="text/javascript">
        window.onload = function() {
            var button = document.getElementById('clickButton');
            <?php if (!empty($keyId) && !empty($amount)) { ?>
                $('#razorpay-form').submit();
            <?php } ?>
            $('#modal-close').on('click', function() {

                //  window.location.replace("donate");
                window.location.href = 'annadana-seva';

            });
            $('#positiveBtn').on('click', function() {

                //  window.location.replace("donate");
                window.location.href = 'annadana-seva';

            });


        }


      
        function modal_close() {
            window.location.href = 'annadana-seva';
        }
    </script> -->





    <script type="text/javascript">
       
       $('#address_check').on('click', function() {
        if ($(this).is(":checked")) {
         var html = '<div class="form-group col-md-12">'
             html +=  '<label>Address<sup class="text-danger">*</sup></label>'
             html +=   '<input id="address" type="text" name="address" value="" class="form-control" required>'
             html +=   '</div>'
           
             html +=   '<div class="form-group col-md-6">'
             html +=   '<label>City<sup class="text-danger">*</sup></label>'
             html +=   '<input id="city" type="text" name="city" value="" class="form-control">'
             html +=   '</div>'
             html +=   '<div class="form-group col-md-6">'
             html +=   '<label>PinCode<sup class="text-danger">*</sup></label>'
             html +=   '<input id="pincode" type="text" name="pincode" value="" class="form-control">'
             html +=   '</div>'
          
            $('.address_div').html(html)
        } else {
            html = '<input id="address" type="hidden" name="address" value="---" class="form-control">'
            $('.address_div').html(html) 
        }
    })

       var input = document.querySelector("#phone_number");
    window.intlTelInput(input,({
      // options here
      initialCountry: "in",
      autoPlaceholder: "polite",
      separateDialCode: true,
    }));
      var phone = $('#phone_number').val();
      if(phone == ''){
       var phone_number = '';
      }else{
         var phone_number = phone
      }
    $(document).ready(function() {
        // $('#phone_number').val("+91");
        $('.iti__flag-container').click(function() { 
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
          // $('#phone_number').val("");
          // $('#phone_number').val("+"+countryCode+" "+ phone_number);
          $('#country_code').val("+"+countryCode);
       });
    });

    
        var selection;
        $(document).ready(function() {

         
            $('#one').on('click', function() {
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').removeAttr('checked');
                $('#custom-text').html('Selected Amount');
                $('#one').prop('checked','checked');
                $('#amount').val($(this).val());
              

            })
            $('#two').on('click', function() {
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('ckecked');
                $('#custom-text').html('Selected Amount');
                $('#two').prop('checked','checked');
                $('#amount').val($(this).val());
            })
            $('#three').on('click', function() {
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
                $('#custom-text').html('Selected Amount');
                $('#three').prop('checked','checked');
                $('#amount').val($(this).val());
            })
            $('#five').on('click', function() {
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
                $('#custom-text').html('Selected Amount');
                $('#five').prop('checked','checked');
                $('#amount').val($(this).val());
            })

            $('#seven').on('click', function() {
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
                $('#custom-text').html('Selected Amount');
                $('#seven').prop('checked','checked');
                $('#amount').val($(this).val());
            })

            $('#other').on('click', function() {
                // var amount = $('#other').val()
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
                $('#custom-text').html('Enter Choice Amount');
                $('#other').prop('checked','checked');
                $('#amount').focus();
                $('#amount').val('');


            })
            $('#amount').on('keydown',function(){
               
                $('#other').prop('checked','checked')
            })
          


            // It has the name attribute "registration"
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
                        maxlength: 10
                    },
                    // pan_number: {
                    //     required: true
                    // },
                    amount: {
                        required: true,
                        number: true
                    },
                   
                },
                // Specify validation error messages
                messages: {
                    name: "Please enter your firstname",
                    mobile_number: {
                        required: "Please provide a mobile_number",
                        minlength: "Your mobile number must be at least 10 characters long",
                        maxlength: "Your mobile number must not be more than 10 characters length"
                    },
                    email: "Please enter a valid email address",
                    // pan: "please enter pan number",
                    amount: "Please enter amount",
                   
                },
             
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  if($('#amount').val() < 300){
                    alert('Minimum Donation is 600')
                  }else{
                    $.ajax ({ 
                          type : 'POST', 
                          url : 'festivals/create_order', 
                          data : $('#popup_paypal_donate_form_onetime_recurring').serialize (),
                          beforeSend: function() {
                    $('.preloader').removeClass('d-none');
                  },
                  success: function(){
                    
                    $('.preloader').addClass('d-none');
                },
                          complete : function(data){
                 
                            var options = {
                                    "key": data.responseJSON.keyId, // Enter the Key ID generated from the Dashboard
                                    "amount": data.responseJSON.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                    "currency": data.responseJSON.currency,
                                    "name": data.responseJSON.company_name,
                                    "description": data.responseJSON.company_description,
                                    "image": data.responseJSON.LOGO_IMAGE,
                                    "order_id": data.responseJSON.razorpay_order_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                    "callback_url": data.responseJSON.callback_url,
                                    // "redirect": true,
                                    "retry" : {
                                      'enabled':false,
                                    },
                                    "prefill": {
                                        "name": data.responseJSON.full_name,
                                        "email": data.responseJSON.email,
                                        "contact": data.responseJSON.phone_number,
                                        "pan_number": data.responseJSON.pan_number,
                                        "address": data.responseJSON.address,
                                    },
                                    "notes": {
                                        "address": data.responseJSON.address
                                    },
                                    "theme": {
                                        "color": "#3399cc"
                                    },
                                    "modal": { 
                                      "escape" : false, 
                                      ondismiss: function(){ 
                                        $('#failed-form').html('<form id="failed_form_submit" action="seva_page/donation_failed/'+data.responseJSON.insert_id+'" method="post" style="display:none"><input type="hidden" name="status" value="Form Closed"><input type="hidden" name="error_code" value=""><input type="hidden" name="error_description" value=""><input type="hidden" name="error_source" value=""><input type="hidden" name="error_reason" value=""><input type="hidden" name="razorpay_order_id" value=""></form>');
                                        $('#failed_form_submit').submit();
                                      } },
                                };
                                var rzp1 = new Razorpay(options);
                                rzp1.on('payment.failed', function (response){
                                    $('#failed-form').html('<form id="failed_form_submit" action="seva_page/donation_failed/'+data.responseJSON.insert_id+'" method="post" style="display:none"><input type="hidden" name="status" value="Failed"><input type="hidden" name="error_code" value="'+response.error.code+'"><input type="hidden" name="error_description" value="'+response.error.description+'"><input type="hidden" name="error_source" value="'+response.error.source+'"><input type="hidden" name="error_reason" value="'+response.error.reason+'"><input type="hidden" name="razorpay_order_id" value="'+response.error.metadata.order_id+'"><input type="hidden" name="razorpay_payment_id" value="'+response.error.metadata.payment_id+'"></form>');
                                    $('#failed_form_submit').submit();
                                });
                              
                                $('#rzp-button1').click(); 
                                // $('#rzp-button1').on('click',function(e){
                                
                                  rzp1.open();
                                  // e.preventDefault();
                                // });
                                // document.getElementById('rzp-button1').onclick = function(e){
                                // }
                          }
                        })
                  }
                }
            });
        });





        $('.customer-logos').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2
                }
            }]
        });

</script>


