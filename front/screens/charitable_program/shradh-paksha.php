<style>
.form-control{
    height:auto
}

form label{
  font-size: 14px;
}
li{
    margin-left:20px;
}
</style>


<div class="container my-5">
  <div class="row">
    <div class="col-md-12 col-lg-6">
      <?php echo $page_items->left_description; ?>
    </div>

    <div class="col-md-12 col-lg-6 bg-light order-first order-lg-2 p-0 mb-3">


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
                      <form id="popup_paypal_donate_form_onetime_recurring" action="" method="POST" enctype="multipart/form-data">
                        <?php if ($this->config->item('payment_mode') == 'test') { ?>
                          <input name="table_name" type="hidden" value="test_payments">
                        <?php } else { ?>
                          <input name="table_name" type="hidden" value="payments">
                        <?php } ?>
                        <input type="hidden" name="donation_type" value="<?php if($payment_type == 0) {echo 'Charitable Programs';}elseif($payment_type == 1){ echo 'Nitya Sevas';}else{ echo 'festival';}; ; ?>">
                        <input id="seva_name" name="seva_name" type="hidden" value="">
                        <input type="hidden" name="slug" value="<?php echo $page_items->page_slug; ?>">
                        <input type="hidden" name="festival" value="shradh-paksha">
                        <input type="hidden" name="tally_head" value="<?php echo  !empty($page_items->tally_head) ? $page_items->tally_head :  'N/A' ; ?>">
                        <input type="hidden" name="seva_code" value="<?php  echo !empty($page_items->seva_code) ? $page_items->seva_code : 'N/A'; ?>">
                        <input type="hidden" name="currency" value="INR">


                        <div class="row">


                            <div class="col-sm-12">
                              
                                <h5> <input name="annadana_check" id="annadana_check" type="checkbox" class="" checked> Annadana Seva</h5>
                            </div>

                            <div class="form-group col-md-12 d-flex   p-0 border-0 mb-2 row">
                            <div class="form-check  col-md-3 mt-2">
                              <input class="form-check-input ml-10" type="radio" checked id="one" name="annadana-radio" data-seva="shradh-paksha-annadana-501" value="501">
                              <label class="form-check-label pl-10" for="one"> ₹ 501  </label> &nbsp;
                            </div>
                          
                            <div class="form-check col-md-3 mt-2">
                              <input class="form-check-input ml-10" type="radio" id="two" name="annadana-radio" data-seva="shradh-paksha-annadana-1101" value="1101">
                              <label class="form-check-label pl-10" for="two"> ₹ 1101 </label> &nbsp;
                            </div>
                         
                            <div class="form-check  col-md-3 mt-2">
                              <input class="form-check-input ml-10" type="radio" id="three" name="annadana-radio" data-seva="shradh-paksha-annadana-2101" value="2101">
                              <label class="form-check-label pl-10" for="three">₹ 2101 </label> &nbsp;
                            </div>
                          
                            <div class="form-check  col-md-3 mt-2">
                              <input class="form-check-input ml-10" type="radio" id="five" name="annadana-radio" data-seva="shradh-paksha-annadana-5101" value="5101">
                              <label class="form-check-label pl-10" for="five">₹ 5101 </label> &nbsp;
                            </div>
                           
                            <div class="form-check  col-md-6 mt-2">
                              <input class="form-check-input ml-10" type="radio" id="annadana-other" name="annadana-radio" value="0">
                              <label class="form-check-label pl-10" for="annadana-other"> Custom amount</label> &nbsp;

                            </div>

                          


                          </div>
                            <div class="col-sm-12">
                                <h5> <input name="gau_check" id="gau_check" type="checkbox" class=""> Gau Seva</h5>
                            </div>

                            <div class="form-group col-md-12 d-flex   p-0 border-0 mb-2 row">
                            <div class="form-check  col-md-3 mt-2">
                              <input class="form-check-input ml-10" type="radio"  id="seven" name="gau-radio" data-seva="shradh-paksha-gau-501" value="501">
                              <label class="form-check-label pl-10" for="seven"> ₹ 501  </label> &nbsp;
                            </div>
                          
                            <div class="form-check col-md-3 mt-2">
                              <input class="form-check-input ml-10" type="radio" id="eight" name="gau-radio" data-seva="shradh-paksha-gau-1101" value="1101">
                              <label class="form-check-label pl-10" for="eight"> ₹ 1101 </label> &nbsp;
                            </div>
                         
                            <div class="form-check  col-md-3 mt-2">
                              <input class="form-check-input ml-10" type="radio" id="nine" name="gau-radio" data-seva="shradh-paksha-gau-2101" value="2101">
                              <label class="form-check-label pl-10" for="nine">₹ 2101 </label> &nbsp;
                            </div>
                          
                            <div class="form-check  col-md-3 mt-2">
                              <input class="form-check-input ml-10" type="radio" id="ten" name="gau-radio" data-seva="shradh-paksha-gau-5101" value="5101">
                              <label class="form-check-label pl-10" for="ten">₹ 5101 </label> &nbsp;
                            </div>
                           
                            <div class="form-check  col-md-6 mt-2">
                              <input class="form-check-input ml-10" type="radio" id="gau-other" name="gau-radio" data-seva=""  value="0">
                              <label class="form-check-label pl-10" for="gau-other"> Choice amount</label> &nbsp;

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
                          <label>Pan Number <small style="font-size: 11px">(Only if you want 80G certificate)</small></label>
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

                        <!-- <div class="row d-none" >
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
         
            <?php if(!empty($page_items->video_link_1) || !empty($page_items->video_link_2) || !empty($page_items->video_link_3)){ ?>              
            <div class="tm-sc-section-title section-title mb-0 mb-md-50">
                <div class="title-wrapper mb-0 text-center">
                    <h6 class="subtitle line-shape-bottom text-theme-colored1 line-shape-center ">Videos</h6>

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
    </div>
</div>
</section>




  <style>
    .razorpay-payment-button {
      visibility: hidden;
    }
  </style>

  <button id="rzp-button1" class="d-none"></button>
  <div id="failed-form"></div>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>





  <script type="text/javascript">

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

    var selection;
    $(document).ready(function() {
    $('#annadana_check').on('change',function(){
        if($('#annadana_check').is(":checked")){
          
        }else{
          $('input[name="annadana-radio"]').removeAttr('checked')
          $('#annadana_check').val('');
          $('#amount').val(+$(this).val() + +$('input[name="gau-radio"]:checked').val());
        }
    })
      $('input[name="annadana-radio"]').on('click',function(){
        $('#annadana_check').prop('checked','true');
        $('#annadana_check').val($(this).attr('data-seva'));
        $('#amount').val($(this).val())
        if($('#gau_check').is(":checked")){
      
        $('#amount').val(+$(this).val() + +$('input[name="gau-radio"]:checked').val());
        }
      })
    $('#gau_check').on('change',function(){
        if($('#gau_check').is(":checked")){
          
        }else{
          $('input[name="gau-radio"]').removeAttr('checked')
          $('#gau_check').val('');
          $('#amount').val(+$(this).val() + +$('input[name="annadana-radio"]:checked').val())

        }
    })
      $('input[name="gau-radio"]').on('click',function(){
        $('#gau_check').prop('checked','true');
        $('#gau_check').val($(this).attr('data-seva'));
        $('#amount').val($(this).val())
        if($('#annadana_check').is(":checked")){
        
        $('#amount').val(+$(this).val() + +$('input[name="annadana-radio"]:checked').val())
        }
      })
   
   
      $('.form-check-input ').on('click', function() {
        $('#custom-text').html('Selected Amount');
        $(this).prop('checked', 'checked');
        // $('#amount').val($(this).val());
        $('#seva_name').val($(this).attr('data-seva'));
       
      })
      

      $('#annadana-other, #gau-other').on('click', function() {
        // var amount = $('#other').val()
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
        $('#annadana_check').prop('checked','true');
        $('#annadana-other, #gau-other').prop('checked', 'checked')
        $('#custom-text').html('Enter Choice Amount');
        $('#other').prop('checked', 'checked');
        $('#amount').focus();
        $('#amount').val('0');
        


      })
      $('#amount').on('keyup', function() {

        $('#annadana-other').prop('checked', 'checked')
        $('#gau-other').prop('checked', 'checked')
        $('#annadana_check').val('shradh-paksha-annadana-gau-other-'+$(this).val())
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
          if ($('#amount').val() < 300) {
            alert('Minimum Donation is 600')
          } else {
            $.ajax({
              type: 'POST',
              url: 'festivals/create_order',
              data: $('#popup_paypal_donate_form_onetime_recurring').serialize(),
              beforeSend: function() {
                    $('.preloader').removeClass('d-none');
                  },
                  success: function(){
                    
                    $('.preloader').addClass('d-none');
                },
              complete: function(data) {

               
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
                  "retry": {
                    'enabled': false,
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