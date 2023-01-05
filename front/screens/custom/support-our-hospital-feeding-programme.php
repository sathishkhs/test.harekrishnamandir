<style>
    .shadow{
        background-color: #ebebeb;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.3) !important;
    }
    .m-0-1{
        margin: 1px;
    }
    .mx-auto{
        margin-left:auto !important;
        margin-right: auto !important;
    }
</style>
<section class="container mt-3">
<div class="row">
            <div class="col-md-12 text-center">
              <h3 class="title">Support Our Hospital Feeding Programme In Gujarat</h3>
            </div>
          </div>
          
          
  <div class="row  pt-4">
    <div class="col-sm-12">
    <h3 class="widget-title line-bottom">Served more than 1.1 crore meals </h3>
     
    </div>
    
     <div class="col-sm-12 col-md-4 ">
      <div class="row  m-0-1">
        <div class="col-sm-4 p-2">
             <img class=" mx-auto d-block" src="assets/images/icons/patient.png" alt="Image" >
        </div>
        <div class="col-sm-8 p-2">
        <h5 class="title m-0 text-center">7000+</h5>
        <p class="text-center">Patients &amp;
              caretakers
              are served daily <br /></p>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4">
      <div class="row  m-0-1">
        <div class="col-sm-4 p-2">
             <img class="mx-auto d-block" src="assets/images/icons/hospitals.png" alt="Image" >
        </div>
        <div class="col-sm-8 p-2">
        <h5 class="title m-0 text-center">13</h5>
        <p class="text-center">Government &amp; municipality hospitals <br /></p>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4">
      <div class="row  m-0-1">
        <div class="col-sm-4 p-2">
             <img class=" d-block mx-auto" src="assets/images/icons/locations.png" alt="Image" >
        </div>
        <div class="col-sm-8 p-2 ">
        <h5 class="title m-0 text-center">4</h5>
        <p class="text-center">Locations (Ahmedabad, Gandhinagar, Vadodara &amp; Jamnagar) <br /></p>
        </div>
      </div>
    </div>


  </div>
</section>

<div class="container my-5">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <p>Patients admitted in government hospitals come mainly from far off villages and towns and are accompanied by their relatives. Unavailability of food in the
hospitals forces them to depend on roadside stalls. The food in these stalls is neither nutritious nor hygienic. It is also an added expense for the family of
the patients who are already struggling to pay the hospital bills.
</p>
      <!-- <p>Nutritious food plays a big role in fast recovery of patients. It
        positively affects their mental, physical, and emotional well-
        being. It boosts their morale and encourages them to have a
        positive attitude towards the treatment and recovery. But
        <span class="text-theme-colored2">getting such nutritious food in government and municipality
          hospitals is a huge challenge for patients.</span>
      </p> -->
      <!-- <p>We have found that patients admitted in these government
        hospitals come mainly from far off villages and towns and
        are accompanied by their relatives. <span class="text-theme-colored2">Unavailability of food in
          the hospitals forces them to depend on roadside stalls. The
          food in these stalls is neither nutritious nor hygienic. It is also
          an added expense for the family of the patients who are
          already struggling to pay the hospital bills.</span></p> -->
          <h3 class="widget-title line-bottom">To provide nutritious food to patients and their caretakers, we initiated the Hospital Feeding Programme.</h3>
      <ul>
        <li>

          <span class="text-theme-colored2">Menu:</span> Rice, Roti, Vegetable dal, Sabji, Salad, Khichadi
          and Soup.
        </li>
        <li>

          <span class="text-theme-colored2">Meal service:</span> Meal is served two times in a day to
          patients and their carers throughout the year
          irrespective of public holidays or festivals.

        </li>
        <li><span class="text-theme-colored2">Cooking facility:</span> Food is cooked in our centralized
          kitchen by adhering to highest level of hygiene
          standards and minimal human intervention.</li>
        <li><span class="text-theme-colored2">Meal delivery:</span> Once the food is cooked it’s packed in
          clean, sanitised vessels and transported to hospitals
          through customized food distribution vehicles.</li>
      </ul>


    </div>

    <div class="col-md-12 col-lg-10 bg-light mx-auto order-first order-md-2 mt-5" style="border-radius: 15px">


      <div class="container pt-0">
        <div class="container">
          <div class="modal-body">
            <section>
              <div class="section-content">
                <div class="container">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <h3 class="mt-0 line-bottom">Offer Seva<span class="font-weight-300"> Now!</span></h3>

                      <!-- ===== START: Paypal Both Onetime/Recurring Form ===== -->
                      <form id="popup_paypal_donate_form_onetime_recurring" action="<?php echo base_url('support-our-hospital-feeding-programme'); ?>" method="POST" enctype="multipart/form-data">
                            <?php if($this->config->item('payment_mode') == 'test'){ ?>
                            <input name="table_name" type="hidden" value="test_payments">
                            <?php } else{ ?>
                              <input name="table_name" type="hidden" value="payments">
                              <?php } ?>
                              <input type="hidden" name="donation_type" value="<?php if($payment_type == 0) {echo 'Charitable Programs';}elseif($payment_type == 1){ echo 'Nitya Sevas';}else{ echo 'festival';}; ?>">
                              <input name="seva_name" type="hidden" value="<?php echo $page_items->page_slug; ?>">
                              <input name="tally_head" type="hidden" value="<?php echo $page_items->tally_head; ?>">
                              <input name="seva_code" type="hidden" value="<?php echo $page_items->seva_code; ?>">
                              <input type="hidden" name="slug" value="<?php echo $page_items->page_slug; ?>">
                              <input type="hidden" name="festival" value="<?php echo $page_items->title; ?>">
                              <input type="hidden" name="currency" value="INR">

                        <div class="row">

                          <div class="form-group d-flex flex-wrap p-20 border-0 mb-2">
                            <div class="form-check d-flex mt-2">
                              <input class="form-check-input ml-10" type="radio" checked id="one" name="radioamount" value="501">
                              <label class="form-check-label pl-10" for="one"> ₹501</label> &nbsp;
                            </div>
                            <div class="form-check d-flex mt-2">
                              <input class="form-check-input ml-10" type="radio" id="two" name="radioamount" value="1101">
                              <label class="form-check-label pl-10" for="two"> ₹1101</label> &nbsp;
                            </div>
                            <div class="form-check d-flex mt-2">
                              <input class="form-check-input ml-10" type="radio" id="three" name="radioamount" value="1501">
                              <label class="form-check-label pl-10" for="three"> ₹1501</label> &nbsp;
                            </div>
                            <div class="form-check d-flex mt-2">
                              <input class="form-check-input ml-10" type="radio" id="five" name="radioamount" value="2101">
                              <label class="form-check-label pl-10" for="five"> ₹2101</label> &nbsp;
                            </div>
                            <div class="form-check d-flex mt-2">
                              <input class="form-check-input ml-10" type="radio" id="seven" name="radioamount" value="5101">
                              <label class="form-check-label pl-10" for="seven"> ₹5101</label> &nbsp;
                            </div>

                            <div class="form-check d-flex mt-2">
                              <input class="form-check-input ml-10" type="radio" id="other" name="radioamount">
                              <label class="form-check-label pl-10" for="other"> Choice amount</label> &nbsp;

                            </div>


                          </div>

                        </div>

                        <div class="row">
                          <div class="form-group col-md-6">
                            <label>Selected Amount</label>
                            <input id="amount" type="text" name="amount" value="" class="form-control"  placeholder="Enter Custom Amount" onkeypress="checkother()">
                          </div>
                          <div class="form-group col-md-6">
                        <label id="">Seva Date</label>
                        <input id="seva_date" type="date" name="seva_date" value="" class="form-control">
                      </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label>Full Name</label>
                            <input id="full_name" type="text" name="full_name" value="" class="form-control" placeholder="Enter Full Name">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Phone Number<sup class="text-danger">*</sup></label>
                            <input type="hidden" id="country_code" name="country_code" value="+91">
                            <input id="phone_number" type="text" name="phone_number" value="" class="form-control">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label>Email Address</label>
                            <input id="email" type="email" name="email" value="" class="form-control" placeholder="Enter Email">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Pan Number</label>
                            <input id="pan_number" type="text" name="pan_number" value="" class="form-control" placeholder="Enter Pan">
                            <small>Only if you want 80G certificate</small>
                          </div>
                        </div>
                        <div class="row">
                          <!-- <div class="form-group col-md-6">
                            <label>Address</label>
                            <input id="city" type="text" name="city" value="" class="form-control" placeholder="Enter City">
                          </div> -->
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

                        <div class="row">
                       
                        </div>

                        <div class="col-sm-2 mx-auto">
                          <div class="form-group">
                            <button type="submit" class="btn btn-flat btn-dark btn-theme-colored2 mt-10 pl-30 pr-30" data-loading-text="Please wait...">Donate Now</button>
                          </div>
                        </div>
                        <div class="col-sm-4 mx-auto">
                            
                            Avail tax exemption under Section 80G
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
       <h3 class="widget-title line-bottom">Need for Hospital Feeding Programme </h3>
      <p>Nutritious food plays a big role in fast recovery of patients. It positively affects their mental, physical, and emotional well-being. It boosts their morale and
encourages them to have a positive attitude towards the treatment and recovery. But <span class="text-theme-colored2">getting such nutritious food in government and municipality hospitals
is a huge challenge for patients. This is where Hospital Feeding Programme comes to their rescue.</span></p>
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

            <form id="razorpay-form" action="<?php echo base_url(); ?>festivals/create_order" method="POST">
              <script type="text/javascript" src="https://checkout.razorpay.com/v1/checkout.js" data-buttontext="" 
              data-key="<?php echo $keyId; ?>" data-amount="<?php echo $amount * 100; ?>" 
              data-currency="INR" data-name="<?php echo $this->config->item('name') ?>" 
              data-image="<?php echo SETTINGS_UPLOAD_PATH . $settings->LOGO_IMAGE ?>" 
              data-description="<?php echo $this->config->item('description') ?>"
               data-prefill.name="<?php echo $full_name ?>" data-prefill.email="<?php echo $email ?>" 
               data-prefill.contact="<?php echo $phone_number ?>" data-prefill.pan="<?php echo $pan_number ?>" 
               data-notes.pan="<?php echo $pan_number ?>" data-notes.shopping_order_id="<?php echo $notes['razorpay_order_id']; ?> " 
               data-modal.confirm_close='true' data-modal.ondismiss=function(){alert('close')} <?php if ($displayCurrency !== 'INR') { ?> 
               data-display_amount="<?php echo $display_amount ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> 
               data-display_currency="<?php echo $display_currency ?>" <?php } ?> data-redirect='true' 
               data-callback_url="<?php echo base_url(); ?>custom_page/save_payment/<?php echo $insert_id . '/' . $table_name; ?>">


              </script>



            </form>


          </div>
        </div>
      </div>
      <!--</div>-->
    </div>
  </div>

  <style>
    .razorpay-payment-button {
      visibility: hidden;
    }
  </style>





  <script type="text/javascript">
    var input = document.querySelector("#phone_number");
    window.intlTelInput(input,({
      // options here
    }));
      var phone = $('#phone_number').val();
      if(phone == ''){
       var phone_number = '';
      }else{
         var phone_number = phone
      }
    $(document).ready(function() {
        $('.iti__flag-container').click(function() { 
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
          $('#phone_number').val("");
          $('#phone_number').val("+"+countryCode+" "+ phone_number);
       });
    });
    
    window.onload = function() {
      var button = document.getElementById('clickButton');
      <?php if (!empty($keyId) && !empty($amount)) { ?>
        $('#razorpay-form').submit();
      <?php } ?>
      $('#modal-close').on('click', function() {

        //  window.location.replace("donate");
        window.location.href = 'support-hospital-feeding-programme';

      });
      $('#positiveBtn').on('click', function() {

        //  window.location.replace("donate");
        window.location.href = 'support-hospital-feeding-programme';

      });


    }
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


    function modal_close() {
      window.location.href = 'support-hospital-feeding-programme-in-gujarat';
    }
  </script>



<button id="rzp-button1" class="d-none"></button>
<div id="failed-form"></div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>




  <script type="text/javascript">
    var selection;
    $(document).ready(function() {


      $('#one').on('click', function() {
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').removeAttr('checked');
        $('#one').prop('checked', 'checked');
        $('#amount').val('501');



      })
      $('#two').on('click', function() {
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('ckecked');
        $('#two').prop('checked', 'checked');
        $('#amount').val('1101');

      })
      $('#three').on('click', function() {
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
        $('#three').prop('checked', 'checked');
        $('#amount').val('1501');

      })
      $('#five').on('click', function() {
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
        $('#five').prop('checked', 'checked');
        $('#amount').val('2101');

      })

      $('#seven').on('click', function() {
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
        $('#seven').prop('checked', 'checked');
        $('#amount').val('5101');

      })

      $('#other').on('click', function() {
        // var amount = $('#other').val()
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
        $('#other').prop('checked', 'checked');
        // $('#amount').val(amount);

      })
      $('#amount').on('keydown', function() {

        $('#other').prop('checked', 'checked')
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
          if ($('#amount').val() < 500) {
            alert('Minimum Donation is 500')
          } else {
            // form.submit();

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