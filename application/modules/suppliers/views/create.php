<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('suppliers/suppliers')?>">List</a></li>
	<li><a href="<?php echo site_url('suppliers/create')?>">Add</a></li>
</ul>
<?php 
	if(isset($message) && !empty($message)){
		?>
		<div class="alert alert-info"><?php echo $message ?></div>
		<?php
	}
?>

<?php echo form_open_multipart('suppliers/create') ?><div class="form-group">
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
			'name' => 'phone',
			'id' 		=> 'phone',
			'class' => 'form-control',
		);
	?>
    <label for="phone">Phone</label>
	<?php echo form_input($input);?>
	<?php echo form_error('phone', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
<label for="type">Type</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<select name="type">
		  <option value="" disabled selected style='display:none;'>Select Type...</option>
		  <option value="1">Paid</option>
		  <option value="0">Free</option>
    </select>
    
	<?php echo form_error('type', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
<label for="varified">Varified</label>&nbsp
	<select name="varified">
		  <option value="" disabled selected style='display:none;'>Select .............</option>
		  <option value="1">Verify</option>
		  <option value="0">Not Verify</option>
    </select>
    
	<?php echo form_error('varified', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'about',
			'id' 		=> 'about',
			'class' => 'form-control',
		);
	?>
    <label for="about">About</label>
	<?php echo form_input($input);?>
	<?php echo form_error('about', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	
    <label for="image">Image</label>
	<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>