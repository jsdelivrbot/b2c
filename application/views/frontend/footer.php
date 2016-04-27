<!--********************* FOOTER SECTION  ****************-->

<div class="container-fluid" id="footer">
	<div class="row footer_bg">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-3 col-md-3 col-lg-3 footer_sec1">
				<p>@2016 Buildmyhome.com All right reserved</p>
			</div>
			<div class="col-sm-5 col-md-5 col-lg-5 footer_sec2">
				<ul>
					<li><a href="">Terms & condition</a></li>
					<li><a href="">Privacy policy</a></li>
					<li><a href="">Cookies</a></li>
					<li><a href="">Sitemap</a></li>
					<li><a href="">Contact Us</a></li>
				</ul>
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
	</div>
</div>

<style>
	#footer{
		width:100%;
	}
	</style>
<script>
	// Window load event used just in case window height is dependant upon images
$(window).bind("load", function() { 
       
       var footerHeight = 0,
           footerTop = 0,
           $footer = $("#footer");
           
       positionFooter();
       
       function positionFooter() {
       
                footerHeight = $footer.height();
                footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
       
               if ( ($(document.body).height()+footerHeight) < $(window).height()) {
                   $footer.css({
                        position: "absolute"
                   }).animate({
                        top: footerTop
                   })
               } else {
                   $footer.css({
                        position: "static"
                   })
               }
               
       }

       $(window)
               .scroll(positionFooter)
               .resize(positionFooter)
               
});
	</script>
<script src="<?php echo base_url('assets/front/js/css3-animate-it.js')?>"> </script>