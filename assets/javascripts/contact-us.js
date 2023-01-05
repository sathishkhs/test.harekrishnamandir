$('#contact_form').validate({
    rules: {
        name : "required",
       
        email: {
            required: true,
            // Specify that email should be validated
            // by the built-in "email" rule
            email: true
          },
          phone:"required",
          message: "required"
    },
    messages: {
        name: "Please enter your Name",
        email: "Please enter your Email",
        email: "Please enter a valid email address"
      },
      submitHandler: function(form) {
            contact_submit()
            // form.submit()
}
})
               
function contact_submit(){
    //   $('#appointment-form').submit(function(e){
    //     e.preventDefault();
        
        var actionURL = 'index/contact_submit';
       var data = $('#contact_form').serialize();

        $.ajax({
              url:actionURL,
              method:"POST",
              data:data,
              success:function(data){
               console.log(data)
                      if(data == 1 || data == '1'){
                    $('#contact_form').html('<h4 style="">Form submission successful. Our support team will get in touch with you please be patience.</h4>')
                      }else if(data == 0 || data == '0'){
                        $('#contact_form').html('<h4 style="">Sorry Form submission failed. Please try again.</h4>')
                      }
                          }
                        });
                        // });
    }
    