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

<?php echo form_open_multipart('users/edit/'.$user->user_id) ?>
	<div class="form-group">
	<img  class="img-circle" alt="<?php echo $user->image;?>" src="<?php echo base_url('assets/upload/').'/'.$user->image;?>" width="100" height="100" />
	</div>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'name',
			'id' 		=> 'name',
			'class' => 'form-control',
			'value' => $user->name,
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
			'value' => $user->email,
		);
	?>
    <label for="email">Email</label>
	<?php echo form_input($input);?>
	<?php echo form_error('email', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><!--div class="form-group">
	<?php
		$input = array(
			'name' => 'password',
			'id' 		=> 'password',
			'class' => 'form-control',
			'value' => $user->password,
		);
	?>
    <label for="password">Password</label>
	<?php echo form_input($input);?>
	<?php echo form_error('password', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div--><div class="form-group">
	<?php
		$input = array(
			'name' => 'contact',
			'id' 		=> 'contact',
			'class' => 'form-control',
			'value' => $user->contact,
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
			'value' => $user->firstname,
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
			'value' => $user->surname,
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
			'value' => $user->stret_no,
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
			'value' => $user->building_name,
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
			'value' => $user->street,
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
			'value' => $user->suburb,
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
			'value' => $user->city,
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
			'value' => $user->country,
		);
	?>
    <label for="country">Country</label>
	<?php echo form_input($input);?>
	<?php echo form_error('country', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<label for="image">Image</label></br>
	
	<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>