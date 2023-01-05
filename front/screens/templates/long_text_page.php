<!DOCTYPE html>
<html dir="ltr" lang="en">

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!-->
<!--<![endif]-->

<head>
	<?php $this->load->view('templates/includes/head'); ?>
</head>

<body class="tm-container-1300px has-side-panel side-panel-right switchable-logo">
	<div class="side-panel-body-overlay"></div>
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KHGP4DZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

		<?php $this->load->view('templates/includes/sidebar'); ?>
		<div id="wrapper" class="clearfix">
		<header id="header" class="header header-layout-type-header-2rows">
			<?php $this->load->view('templates/includes/topbar'); ?>
			<?php $this->load->view('templates/includes/navbar'); ?>
		</header>
		 <!-- Start main-content -->
		 <div class="main-content-area">
		 <?php $this->load->view('templates/includes/banner'); ?>
		 <?php $this->load->view($view_path); ?>
		</div>
		<?php $this->load->view('templates/includes/footer'); ?>
		<!-- <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a> -->

		</div>
			
			<?php $this->load->view('templates/includes/scripts'); ?>
			<?php if (!empty($scripts) && count($scripts) > 0) : ?>
			<?php foreach ($scripts as $script) : ?>
				<script src="<?php echo $script; ?>"></script>
			<?php endforeach ?>
			<?php endif ?>

		</body>

<!-- Mirrored from html.thememascot.net/2020/charity/ecoife/ecoife-html/index-mp-layout2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Feb 2022 17:20:43 GMT -->
</html>


