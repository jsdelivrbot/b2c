<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo SITE_NAME; ?> <?php echo isset($title)?$title:'';?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jssor.slider.mini.js"></script>
  
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/animations.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/styles.css" type="text/css">
   <script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $Idle: 0,
              $AutoPlaySteps: 4,
              $SlideDuration: 1600,
              $SlideEasing: $Jease$.$Linear,
              $PauseOnHover: 4,
              $SlideWidth: 200,
              $Cols: 7
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1150);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
  
  
</head>
<body>

<!-- HEADER -----------------------------------
-->

<div class="container-fluid">
	<div class="row header_bg">
		<div class="col-sm-12 col-md-12 col-lg-12 padding_remove">
			<div class="col-sm-4 col-md-4 col-lg-4">
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<div class="user_register" style="overflow:hidden">
					<ul>
						<li><a href="" data-toggle="modal" data-target="#squarespaceModal"><i class="fa fa-sign-in"></i> Sign in</a>
							<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<h3 class="modal-title" id="lineModalLabel">Sign in</h3>
									</div>
									<div class="modal-body">
										<div class="row modal_paddng">
											<div class="col-sm-6 col-md-6 col-lg-6 modal_content">
												<a href="<?php echo base_url('users/customer_login');?>"><i><img src="<?php echo base_url();?>assets/front/img/user.png" alt="image"></i> Customer Login</a>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6  modal_content">
												<a href="supplier_login.html"><i><img src="<?php echo base_url();?>assets/front/img/people.png" alt="image"></i> Supplier Login</a>
											</div>
										</div>
									</div>
								</div>
							  </div>
							</div>
						</li>
						<li><a href="" data-toggle="modal" data-target="#squarespaceModal_2"><i class="fa fa-user-plus"></i> Sign Up</a>
							<div class="modal fade" id="squarespaceModal_2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<h3 class="modal-title" id="lineModalLabel">Sign in</h3>
									</div>
									<div class="modal-body">
										<div class="row modal_paddng">
											<div class="col-sm-6 col-md-6 col-lg-6 modal_content">
												<a href="<?php echo base_url('users/customer_register');?>"><i><img src="<?php echo base_url();?>assets/front/img/user.png" alt="image"></i> Customer Registration</a>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6  modal_content">
												<a href="supplier_registration.html"><i><img src="<?php echo base_url();?>assets/front/img/people.png" alt="image"></i> Supplier Registration</a>
											</div>
										</div>
									</div>
								</div>
							  </div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<div class="social_icons">
					<ul>
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-google-plus"></i></a></li>
						<li><a href=""><i class="fa fa-linkedin"></i></a></li>
						<li><a href=""><i class="fa fa-youtube-play"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-3 col-md-3 col-lg-3 logo">
				<h1><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/front/img/logo.png" class="img-responsive" alt="Logo"></a></h1>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">
				<nav class="navbar navbar-default">
				  
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">Brand</a>
					</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li><a href="<?php echo base_url();?>">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact Us</a></li>
					  </ul>
					  
					  
					</div><!-- /.navbar-collapse -->
				
				  
				</nav>
			</div>
		</div>
	</div>
</div>





