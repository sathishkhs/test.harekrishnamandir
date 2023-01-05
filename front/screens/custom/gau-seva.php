
<div class="container my-5">
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <p>Gau Seva or taking care of cows has been an integral part of the Vedic culture and heritage. To protect and care for cows is considered as one of the most revered services. </p>
            <h6>At Hare Krishna Mandir Ahmedabad, we have a Gaushala and presently taking care of 200 cows. </h6>
            <h3 class="widget-title line-bottom">Our service </h3>
            <p >We have a team of well-trained and skilled staff dedicated to look after the herd. We provide:</p>

            <ul>
                <li>Quality fodder and regular supplements</li>
	<li>Clean and hygienic shelter </li>
    <li> Large field for cows to graze freely</li> 
	<li>Routine medical check-up</li>

            </ul>
        </div>

<div class="col-md-12 col-lg-6 bg-light">


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
                  <form id="popup_paypal_donate_form_onetime_recurring" action="<?php echo base_url('gau-seva'); ?>"  method="POST" enctype="multipart/form-data">
                    <input name="table_name" type="hidden" value="payments">

                    <div class="row">
                       
                        <div class="form-group d-flex flex-wrap form-control p-20 border-0 mb-2">
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" checked id="one" name="radioamount" value="1000" >
                                                <label class="form-check-label pl-10" for="one"> ₹1000</label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="two" name="radioamount" value="2000" >
                                                <label class="form-check-label pl-10" for="two"> ₹2000</label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="three" name="radioamount" value="5000" >
                                                <label class="form-check-label pl-10" for="three"> ₹5000</label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="five" name="radioamount" value="10000">
                                                <label class="form-check-label pl-10" for="five"> ₹10000</label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="seven" name="radioamount" value="15000" >
                                                <label class="form-check-label pl-10" for="seven"> ₹15000</label> &nbsp;
                                            </div>

                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="other" name="radioamount" >
                                                <label class="form-check-label pl-10" for="other"> Custom amount</label> &nbsp;
                                               
                                            </div>


                                        </div>
                       
                    </div>

                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Custom Amount</label>
                        <input id="amount" type="text" name="amount" value="" class="form-control" onkeypress="checkother()">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Full Name</label>
                        <input id="full_name" type="text" name="full_name" value="" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <input id="phone_number" type="text" name="phone_number" value="" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input id="email" type="email" name="email" value="" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Pan Number</label>
                        <input id="pan_number" type="text" name="pan_number" value="" class="form-control">
                        <small>Only if you want 80G certificate</small>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Address</label>
                        <input id="city" type="text" name="city" value="" class="form-control">
                      </div>
                    </div>
                   
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
                    
                    <form id="razorpay-form" action="<?php echo base_url(); ?>custom_page/save_payment" method="POST">
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

<script type="text/javascript">
        window.onload = function() {
            var button = document.getElementById('clickButton');
            <?php if (!empty($keyId) && !empty($amount)) { ?>
                $('#razorpay-form').submit();
            <?php } ?>
            $('#modal-close').on('click', function() {

                //  window.location.replace("donate");
                window.location.href = 'gau-seva';

            });


        }


      
        function modal_close() {
            window.location.href = 'gau-seva';
        }
    </script>





    <script type="text/javascript">
       

        var selection;
        $(document).ready(function() {

         
            $('#one').on('click', function() {
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').removeAttr('checked');
                $('#one').prop('checked','checked');
                $('#amount').val('1000');
              
              

            })
            $('#two').on('click', function() {
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('ckecked');
                $('#two').prop('checked','checked');
                $('#amount').val('2000');

            })
            $('#three').on('click', function() {
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
                $('#three').prop('checked','checked');
                $('#amount').val('5000');

            })
            $('#five').on('click', function() {
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
                $('#five').prop('checked','checked');
                $('#amount').val('10000');

            })

            $('#seven').on('click', function() {
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
                $('#seven').prop('checked','checked');
                $('#amount').val('15000');

            })

            $('#other').on('click', function() {
                // var amount = $('#other').val()
                // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
                $('#other').prop('checked','checked');
                // $('#amount').val(amount);

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
                        maxlength: 12
                    },
                    pan_number: {
                        // required: true
                    },
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
                        maxlength: "Your mobile number must not be more than 12 characters length"
                    },
                    email: "Please enter a valid email address",
                    pan: "please enter pan number",
                    amount: "Please enter amount",
                   
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    if($('#amount').val() < 300){
                    alert('Minimum Donation is 300')
                  }else{
                    form.submit();
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