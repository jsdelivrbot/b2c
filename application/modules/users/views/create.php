<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('users/users')?>">List</a></li>
	<li><a href="<?php echo site_url('users/create')?>">Add</a></li>
</ul>
<?php 
	if(isset($message) && !empty($message)){
		?>
		<div class="alert alert-info"><?php echo $message ?></div>
		<?php
	}
?>

<?php echo form_open_multipart('users/create') ?><div class="form-group">
	<?php
		$input = array(
			'name' => 'name',
			'id' 		=> 'name',
			'class' => 'form-control',
		);
	?>
    <label for="name">Name</label>
	<?php echo form_input($input);?>
	<?php echo form_error('name', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'email',
			'id' 		=> 'email',
			'class' => 'form-control',
		);
	?>
    <label for="email">Email</label>
	<?php echo form_input($input);?>
	<?php echo form_error('email', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'password',
			'id' 		=> 'password',
			'class' => 'form-control',
		);
	?>
    <label for="password">Password</label>
	<?php echo form_input($input);?>
	<?php echo form_error('password', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'contact',
			'id' 		=> 'contact',
			'class' => 'form-control',
		);
	?>
    <label for="contact">Contact</label>
	<?php echo form_input($input);?>
	<?php echo form_error('contact', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'firstname',
			'id' 		=> 'firstname',
			'class' => 'form-control',
		);
	?>
    <label for="firstname">Firstname</label>
	<?php echo form_input($input);?>
	<?php echo form_error('firstname', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'surname',
			'id' 		=> 'surname',
			'class' => 'form-control',
		);
	?>
    <label for="surname">Surname</label>
	<?php echo form_input($input);?>
	<?php echo form_error('surname', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'stret_no',
			'id' 		=> 'stret_no',
			'class' => 'form-control',
		);
	?>
    <label for="stret_no">Stret No</label>
	<?php echo form_input($input);?>
	<?php echo form_error('stret_no', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'building_name',
			'id' 		=> 'building_name',
			'class' => 'form-control',
		);
	?>
    <label for="building_name">Building Name</label>
	<?php echo form_input($input);?>
	<?php echo form_error('building_name', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'street',
			'id' 		=> 'street',
			'class' => 'form-control',
		);
	?>
    <label for="street">Street</label>
	<?php echo form_input($input);?>
	<?php echo form_error('street', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'suburb',
			'id' 		=> 'suburb',
			'class' => 'form-control',
		);
	?>
    <label for="suburb">Suburb</label>
	<?php echo form_input($input);?>
	<?php echo form_error('suburb', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'city',
			'id' 		=> 'city',
			'class' => 'form-control',
		);
	?>
    <label for="city">City</label>
	<?php echo form_input($input);?>
	<?php echo form_error('city', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'country',
			'id' 		=> 'country',
			'class' => 'form-control',
		);
	?>
    <label for="country">Country</label>
	<?php echo form_input($input);?>
	<?php echo form_error('country', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	
    <label for="image">Image</label>
	<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>