<!-- BANNER VinaY Gupta Code--------------------->
<?php 
$this->load->helper('banners/banner');
$banner = get_banners();
//print'<pre>';print_r($banner);die;

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 padding_remove">
			<div id="carousel-example-generic" class="carousel slide respnsive_hide" data-ride="carousel" style="position:relative;">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<?php 
						$activeee=true;
						for($k=0; $k<count($banner); $k++){
				?>
				
				<li data-target="#carousel-example-generic" data-slide-to="0" class="<?php if($activeee==true){ echo 'active';} else { echo '';} ?>"></li>
						<?php $activeee=false; } ?>
			</ol>


			  <!-- Wrapper for slides -->
			  <div class="carousel-inner " role="listbox">
			  <?php  
					$active=true; 
						for($j=0; $j<count($banner); $j++){
							foreach($banner as $row) {	
					?>
				<div class="item <?php if($active==true) echo 'active'; else echo ''; ?>">
				  <img src="<?php if($row->image == ''){echo base_url('assets/admin/images/BAnner.png');}else{echo base_url('assets/upload/banner_image/'.$row->image);} ?>" alt="banner" class="img-responsive banner_height" width="100%">
				  <div class="carousel-caption">
					
				  </div>
				  
				</div>
				<?php $active=false;} }?>
				
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="false"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
			<div class="carousel_item animatedParent data-sequence='500'">
				<div class="carousel_headng animated growIn slower'  data-id='1'">
					Providing <font>Building</font> solutions to all 
				</div>
				<div class="clear"></div>
				<div class="carousel_search animated bounceInLeft slower  data-id='3'">
					<form method="get" action="/" class="form-inline" >
						<input name="loc" class="span5" type="text"  placeholder="Search for Product & Services">
						<button type="submit" class="btn btn-primary search_btn"> <i class="fa fa-search"></i></button>
					</form>
				</div>
				<div class="clear"></div>
				<div class="carousel_option animated bounceInRight slower' data-id='4'">
					<select id="options" class="select_optn" onchange="optionCheck()">
						<option>Select Product</option>
						<option value="show">Show Div</option>
						<option value="goto">Go To Google</option>
					</select>
					<select id="options" class="select_optn" onchange="optionCheck()">
						<option>Select Services</option>
						<option value="show">Show Div</option>
						<option value="goto">Go To Google</option>
					</select>
					<button type="submit" class="btn btn-primary optn_btn">Search</button>
				</div>
			</div>
		</div>
	</div>
</div>