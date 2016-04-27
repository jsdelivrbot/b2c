<!DOCTYPE html>
<html>
<head>
	

	<title>Customer Registration Form</title>
	
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		 <?php
					$error = $this->session->flashdata('error');
					$message = $this->session->flashdata('message');
					if(!empty($error)){
						echo '<div class="alert alert-danger">'.$error.'</div>';
					}
					if(!empty($message)){
						echo '<div class="alert alert-info">'.$message.'</div>';
					}
				?>
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Customer Registration Form</h4>
			</div>
			<div class="mid-top wow fadeInUpBig animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUpBig;">
			<div class="panel-body">
				
				 <form id="test" name="test" action="<?php echo base_url('users/customer_register')?>" method="post">
				<div class="form-group">
					<label for="firstname">First Name</label>
				 <em class="important">*</em>
					<input class="form-control" name="firstname" placeholder="Your First Name" type="text" maxlength="255"/>
					<span class="text-danger"><?php echo form_error('firstname', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
					</span>
				</div>

				<div class="form-group">
					<label for="surname">Last Name</label>
					 <em class="important">*</em>
					<input class="form-control" name="surname" placeholder="Last Name" type="text" maxlength="255" />
					<span class="text-danger"><?php echo form_error('surname', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
					</span>
				</div>
				
				<div class="form-group">
					<label for="email">Email ID</label>
					 <em class="important">*</em>
					<input class="form-control" name="email" placeholder="Email-ID" type="text" maxlength="255" />
					<span class="text-danger"><?php echo form_error('email', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
					</span>
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					 <em class="important">*</em>
					<input class="form-control" name="password" placeholder="Password" type="password" />
					<span class="text-danger"><?php echo form_error('password', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
					</span>
				</div>
				<div class="form-group">
					<label for="confirmpassword">Confirm Password</label>
					 <em class="important">*</em>
					<input class="form-control" name="confirmpassword" placeholder="Password" type="password" />
					<span class="text-danger"><?php echo form_error('confirmpassword', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
					</span>
				</div>

				<div class="form-group">
					<label for="contact">Contact</label>
					 <em class="important">*</em>
					<input class="form-control" name="contact" placeholder="Contect Number" type="text" />
					<span class="text-danger"><?php echo form_error('contact', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
					</span>
				</div>
				<div class="form-group">
					<label for="city">City</label>
					 <em class="important">*</em>
					<input class="form-control" name="city" placeholder="City Name" type="text" maxlength="255"/>
					<span class="text-danger"><?php echo form_error('city', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
					</span>
				</div>
				<div class="form-group">
					<label for="country">Country</label>
					 <em class="important">*</em>
					<input class="form-control" name="country" placeholder="Country Name" type="text" maxlength="255"/>
					<span class="text-danger"><?php echo form_error('country', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
					</span>
				</div>

				<div class="form-group">
					<button name="submit" type="submit" class="btn btn-default">Signup</button>
					<button name="cancel" type="reset" class="btn btn-default">Cancel</button>
				</div>
				<?php echo form_close(); ?>
				<?php echo $this->session->flashdata('msg'); ?>
			</div>
		</div>
		</div>
	</div>
</div>
</div>
</body>
</html>