<!-- Bootstrap core JavaScript-->

<script src="../js-plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../js-plugins/jquery-easing/jquery.easing.min.js"></script>
<!-- Time Picker -->
<script src="assets/js/datetimepicker/jquery.datetimepicker.full.js"></script>
<!-- <script src="../js-plugins/timepicker/jquery.timepicker.min.js"></script> -->

<!-- Custom scripts for all pages-->
<script src="/js/sb-admin-2.min.js"></script>
<script src="assets/js/ckeditor/ckeditor.js"></script>

<script>
 
    $(function(){           
      
            $('input[type=datetime-local]').datetimepicker({
                inline:true,
                }
             );
       
    });

    CKEDITOR.replace( '.ckeditor', {
        height: 300,
  filebrowserUploadUrl: "blog/upload_editor_image"
        // extraPlugins : 'image2,codesnippet,uploadimage',
        // codeSnippet_theme: 'monokai_sublime',
        // height: 300,
        // enterMode: CKEDITOR.ENTER_BR,
        // filebrowserImageUploadUrl : '<?=base_url();?>[Ck_upload PATH]/?type=image&path=work'
    } );
</script>
