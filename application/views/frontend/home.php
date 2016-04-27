<?php $this->load->view('frontend/header');?>

<?php $this->load->view('frontend/menu');?>
<!-- CONTAINER 1 -------------------------------->
<?php 
$this->load->helper('category_management/category');

$category = get_category();
$category_DESC=get_category_by_DESC();
//print'<pre>';print_r($category_DESC);

?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 container_1_headng">
			<h2><i><img src="<?php echo base_url();?>assets/front/img/thumb_up.png"></i> Available Product & Services</h2>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-12 cont_1_hedng_2">
			<h2><i>Complete Product & Services for everything needed to build</i></h2>
		</div>
	</div>
	<div class="row animatedParent" style="overflow:hidden;">
<?php foreach($category as $row) {?>
		<div class="col-sm-4 col-md-4 col-lg-4 animated bounceInLeft respnsve_padding">
			<div class="cuadro_intro_hover " style="background-color:#cccccc;">
				<p style="text-align:center;">
					<!--img src="<?php echo base_url('assets/upload/'.$row->image);?>" class="img-responsive" alt="image" width="100%"-->
					<img src="<?php if($row->image == ''){echo base_url('assets/admin/images/noimage.png');}else{echo base_url('assets/upload/category_image/'.$row->image);} ?>" class="img-responsive" alt="image" width="100%">
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style=""><?php echo $row->name ?></h3>
						<p><?php echo $row->description ?></p>
						<a class=" btn btn-default" href="<?php $row->id?>"><span class="glyphicon glyphicon-plus"> INFO</span></a>
					</div>
				</div>
			</div>
		</div> <?php } ?>
		<!--div class="col-sm-4 col-md-4 col-lg-4 animated bounceInLeft respnsve_padding">
			<div class="cuadro_intro_hover " style="background-color:#cccccc;">
				<p style="text-align:center;">
					<img src="<?php echo base_url();?>assets/front/img/img_3.png" class="img-responsive" alt="image" width="100%">
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style="">FACTORY</h3>
						<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
						<a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 animated bounceInLeft respnsve_padding">
			<div class="cuadro_intro_hover " style="background-color:#cccccc;">
				<p style="text-align:center;">
					<img src="<?php echo base_url();?>assets/front/img/img_2.png" class="img-responsive" alt="image" width="100%">
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style="">SHOWROOM</h3>
						<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
						<a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
					</div>
				</div>
			</div>
		</div-->
	</div>
	<div class="row cont_1_view margin_remove">
		<br><!--a href="">View all <i class="fa fa-arrow-circle-right"></i></a-->
	</div>
	<div class="row animatedParent" style="overflow:hidden;">
	<?php foreach($category_DESC as $category_DESC) {?>
		<div class="col-sm-3 col-md-3 col-lg-3 animated bounceInRight respnsve_padding">
			<div class="cuadro_intro_hover " style="background-color:#cccccc;">
				<p style="text-align:center;">
					<img src="<?php if($category_DESC->image == ''){echo base_url('assets/admin/images/noimage.png');}else{echo base_url('assets/upload/category_image/'.$category_DESC->image);} ?>" class="img-responsive" alt="image" width="100%">
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style=""><?php echo $category_DESC->name ?></h3>
						<p><?php echo $category_DESC->description ?></p>
						<a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
					</div>
				</div>
			</div>
		</div>
		<?php }  ?>
		<!--div class="col-sm-3 col-md-3 col-lg-3 animated bounceInRight respnsve_padding">
			<div class="cuadro_intro_hover " style="background-color:#cccccc;">
				<p style="text-align:center;">
					<img src="<?php echo base_url();?>assets/front/img/img_4.png" class="img-responsive" alt="image" width="100%">
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style="">KITCHEN</h3>
						<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
						<a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 animated bounceInRight respnsve_padding">
			<div class="cuadro_intro_hover " style="background-color:#cccccc;">
				<p style="text-align:center;">
					<img src="<?php echo base_url();?>assets/front/img/img_5.png" class="img-responsive" alt="image" width="100%">
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style="">HARDWARE</h3>
						<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
						<a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 animated bounceInRight respnsve_padding">
			<div class="cuadro_intro_hover " style="background-color:#cccccc;">
				<p style="text-align:center;">
					<img src="<?php echo base_url();?>assets/front/img/img_6.png" class="img-responsive" alt="image" width="100%">
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style="">PLYWOOD</h3>
						<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
						<a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 animated bounceInRight respnsve_padding">
			<div class="cuadro_intro_hover " style="background-color:#cccccc;">
				<p style="text-align:center;">
					<img src="<?php echo base_url();?>assets/front/img/img_7.png" class="img-responsive" alt="image" width="100%">
				</p>
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3 style="">BATHROOMS</h3>
						<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
						<a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
					</div>
				</div>
			</div>
		</div-->
	</div>
	<!--div class="row margin_remove cont_1_view">
		<a href="">View all <i class="fa fa-arrow-circle-right"></i></a>
	</div-->		
</div>
<!-- OUR Trusted CLIENTS -------------------------------->

<?php $this->load->helper('trusted_clients/trustedclient');

$trusted_clients=get_trusted_client();
//print'<pre>';print_r($trusted_clients);die;

?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 container_1_headng">
			<h2><i><img src="<?php echo base_url();?>assets/front/img/thumb_up.png"></i> Our Trusted Clients</h2>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-12" style="padding-top:10px;padding-bottom:10px;">
			<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden;">
             <?php foreach($trusted_clients as $trusted_client) {?>
            <div style="display: none;">
           
                <img src="<?php if($trusted_client->image == ''){echo base_url('assets/admin/images/noimage.png');}else{echo base_url('assets/upload/trusted_client_images/'.$trusted_client->image);} ?>" alt="image" class="img-responsive">
            </div>

<?php } ?>
            <!--img src="<?php echo base_url();?>assets/front/img/img_8.png" alt="image" class="img-responsive">
            </div>
            <div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_9.png" alt="image" class="img-responsive">
            </div>
            <div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_10.png" alt="image" class="img-responsive">
            </div>
            <div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_11.png" alt="image" class="img-responsive">
            </div>
            <div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_8.png" alt="image" class="img-responsive">
            </div>
            <div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_9.png" alt="image" class="img-responsive">
            </div>
            <div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_10.png" alt="image" class="img-responsive">
            </div>
            <div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_11.png" alt="image" class="img-responsive">
            </div>
            <div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_8.png" alt="image" class="img-responsive">
            </div>
            <div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_9.png" alt="image" class="img-responsive">
            </div>
            <div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_10.png" alt="image" class="img-responsive">
            </div>
			<div style="display: none;">
                <img src="<?php echo base_url();?>assets/front/img/img_11.png" alt="image" class="img-responsive">
            </div-->
        </div>
    </div>
			<!--<div class="col-sm-3 col-md-3 col-lg-3">
				<img src="images/img_8.png" alt="image" class="img-responsive">
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
				<img src="images/img_9.png" alt="image" class="img-responsive">
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
				<img src="images/img_10.png" alt="image" class="img-responsive">
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
				<img src="images/img_11.png" alt="image" class="img-responsive">
			</div>-->
		</div>
	</div>
</div>
<?php $this->load->view('frontend/footer');?>