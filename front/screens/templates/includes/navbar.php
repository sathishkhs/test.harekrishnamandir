<style>
.whatsapp-float{
  position: fixed;
  /* width: 190px; */
  margin-top: 40px;
  transition: all 0.3s linear;
  /* box-shadow: 2px 2px 8px 0px rgba(0,0,0,.4); */
  bottom:10px;
  right:15px;
  z-index: 9999;
  /* background: #3fbb50; */

}
/* .whatsapp-float:hover{
	right: 150px;
} */
.whatsapp-float ul{
  padding-left: 0px;
  margin-bottom:0;
}
.whatsapp-float li{
  /* height: 58px;
  position:relative; */
	list-style:none;
	/* width: 100%;
	border-radius:50% */
}

.whatsapp-float li a{
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50px;
  width: 50px;
  line-height: 50px;
  /* padding-left:30px; */
  /* border-bottom: 1px solid rgba(0,0,0,.4); */
  transition: all .3s linear;
  background-color: #3fbb50;
  border-radius:50px
}
/* .whatsapp-float li:nth-child(1) {
  background: #3fbb50;
} */

.whatsapp-float li a i{
  font-size: 30px;
 } 
/* .whatsapp-float ul li a span{
  display: none;
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
} */

/* 
.whatsapp-float ul:hover li a {
  z-index:1;
  width: 240px;
}

.whatsapp-float ul:hover li a span{
  padding-left: 30%;
  display: block;
} */

@media (max-width: 680px){
  /* .whatsapp-float{
    position: fixed;
    bottom:0;
  width: 100%;
  z-index: 99999;
  right:0;
}
.whatsapp-float li a{
	border-radius:0;
	width: 100%;
} */
.whatsapp-float ul li a span{
  /* display: block; */
}
/* .whatsapp-float ul:hover {
  z-index:9999;
  width: 100%;
}
.whatsapp-float ul li:hover a span{
  padding-left: 0;
  display: block;
}
.whatsapp-float:hover{
	right:0;
} */
}
  </style>

<div class="header-nav tm-enable-navbar-hide-on-scroll">
	<div class="header-nav-wrapper navbar-scrolltofixed">
		<div class="menuzord-container header-nav-container">
			<div class="container position-relative">
				<div class="row header-nav-col-row">
					<div class="col-sm-auto align-self-center">
						<a class="menuzord-brand site-brand" href="">
							<img class="logo-default logo-1x" src="<?php echo SETTINGS_UPLOAD_PATH . $settings->LOGO_IMAGE ?>" alt="Logo">
							<img class="logo-default logo-2x retina" src="<?php echo SETTINGS_UPLOAD_PATH . $settings->LOGO_IMAGE ?>" alt="Logo">
						</a>
					</div>
						<div class="col-sm-auto ms-auto pr-0 align-self-center  d-xl-none">
						<div class="element pt-0 pt-lg-10 pb-0">
				  <a href="donate" class="btn btn-theme-colored2 btn-flat btn-sm px-3 py-2">Donate Now <small style="font-size: 10px;display:block">Avail 80G Tax</small></a>
				 
				</div>
					</div>
					<div class="col-sm-auto ms-auto pr-0 align-self-center">
						<nav id="top-primary-nav" class="menuzord theme-color1" data-effect="fade" data-animation="none" data-align="right">
							<ul id="main-nav" class="menuzord-menu">

								<!-- This part is without submenu  -->
								<?php if (!empty($header_menu)) { ?>
									<?php foreach ($header_menu as $header) { ?>
										<?php if ($header->submenu == null || empty($header->submenu)) { ?>
											<li><a class="<?php echo $header->menuitem_link == 'donate' ? 'btn btn-default btn-theme-colored btn-xs ' : '';  ?>" target="<?php echo $header->menuitem_target; ?>" href="<?php echo ($header->menuitem_link == '#') ? 'javascript:void(0)' : $header->menuitem_link; ?>"><?php echo $header->menuitem_text; ?></a> </li>
										<?php } ?>

										<!-- This part is for first layer submenu -->
										<?php if (!empty($header->submenu)) : ?>
											<li><a class="<?php echo $header->menuitem_link == 'donate' ? 'btn btn-default btn-theme-colored btn-xs ' : '';  ?>" href="<?php echo ($header->menuitem_link == '#') ? 'javascript:void(0)' : $header->menuitem_link; ?>"><?php echo $header->menuitem_text; ?></a>
												<ul class="dropdown">
													<?php foreach ($header->submenu as $submenu) : ?>
														<li><a target="<?php echo $submenu->menuitem_target; ?>" href="<?php echo $submenu->menuitem_link; ?>"><?php echo $submenu->menuitem_text; ?></a>
															<!-- This is second layer submenu	 -->
															<?php if (!empty($submenu->submenu)) : ?>
																<ul class="dropdown">
																	<?php foreach ($submenu->submenu as $submenu_2) : ?>
																		<li><a target="<?php echo $submenu_2->menuitem_target; ?>" href="<?php echo $submenu_2->menuitem_link ?>"><?php echo $submenu_2->menuitem_text; ?></a></li>
																	<?php endforeach; ?>
																</ul>
															<?php endif; ?>
														</li>
													<?php endforeach; ?>
												</ul>
											</li>
										<?php endif; ?>
									<?php } ?>
								<?php } ?>
								<li>
									<!-- <a target="" class="btn btn-default btn-theme-colored btn-xs font-16" href="donate">Donate</a> -->
								</li>
							</ul>

						</nav>
					</div>
				</div>

				<div class="row d-block d-xl-none">
					<div class="col-12">
						<nav id="top-primary-nav-clone" class="menuzord d-block d-xl-none default menuzord-color-default menuzord-border-boxed menuzord-responsive" data-effect="slide" data-animation="none" data-align="right">
							<ul id="main-nav-clone" class="menuzord-menu menuzord-right menuzord-indented scrollable">
							</ul>
						</nav>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<nav class="whatsapp-float">
  <ul>
  
   <li><a target="_blank" href="https://api.whatsapp.com/send?phone=919228023235&text=Start%20Chat..%20Hare%20Krishna!">
	<i class="fab fa-whatsapp"></i>
	<span></span></a>
   </li>

   

  </ul>
</nav>