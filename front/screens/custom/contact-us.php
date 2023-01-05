<section class="divider">
      <div class="container">
        <div class="row pt-30">
          <div class="col-lg-4">
            <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate bg-white-f1 p-30 mb-30">
              <div class="icon-box-wrapper">
                <div class="icon-wrapper">
                  <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-044-call-1"></i> </a>
                </div>
                <div class="icon-text">
                  <h5 class="icon-box-title mt-0">Phone</h5>
                  <div class="content">
                    
                      <a href="tel:<?php echo $settings->TOLL_FREE_TIME; ?>"><?php echo $settings->TOLL_FREE_TIME; ?></a>
                      
                    </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate bg-white-f1 p-30 mb-30">
              <div class="icon-box-wrapper">
                <div class="icon-wrapper">
                  <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-043-email-1"></i> </a>
                </div>
                <div class="icon-text">
                  <h5 class="icon-box-title mt-0">Email</h5>
                  <div class="content"><a href="mailto:<?php echo $settings->EMAIL; ?>"><?php echo $settings->EMAIL; ?></a></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate bg-white-f1 p-30 mb-30">
              <div class="icon-box-wrapper">
                <div class="icon-wrapper">
                  <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-025-world"></i> </a>
                </div>
                <div class="icon-text">
                  <h5 class="icon-box-title mt-0">Address</h5>
                  <div class="content"><?php echo $settings->OFFICE_ADDRESS; ?></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            
          </div>
          <div class="col-lg-8 ">
            <h2 class="mt-0 mb-0">For Enquiries</h2>
         
            <!-- Contact Form -->
            <form id="contact_form" name="contact_form" class="" action="index/contact_submit" method="post" novalidate="novalidate">
              <div class="row">
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label>Name <small>*</small></label>
                    <input name="name" class="form-control" type="text" placeholder="Enter Name" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label>Email</label>
                    <input name="email" class="form-control required email" type="email" placeholder="Enter Email" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label>Subject <small>*</small></label>
                    <input name="subject" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label>Phone <small>*</small></label>
                    <input name="phone" class="form-control" type="text" placeholder="Enter Phone" required>
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label>Message <small>*</small></label>
                <textarea name="message" class="form-control required" rows="8" placeholder="Enter Message" required></textarea>
              </div>
              <div class="mb-3">
                <input  class="form-control" type="hidden" value="">
                <button type="submit" class="btn btn-theme-colored1 text-white text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px" data-loading-text="Please wait...">Send your message</button>
                <button type="reset" class="btn btn-theme-colored2 text-white text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">Reset</button>
              </div>
            </form>
       
            <!-- Contact Form Validation-->
            <!-- <script>
              (function($) {
                $("#contact_form").validate({
                  submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = '#form-result';
                    $(form_result_div).remove();
                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                    var form_btn_old_msg = form_btn.html();
                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                    $(form).ajaxSubmit({
                      dataType:  'json',
                      success: function(data) {
                        if( data.status == 'true' ) {
                          $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                      }
                    });
                  }
                });
              })(jQuery);
            </script> -->
          </div>
        </div>
      </div>
    </section>