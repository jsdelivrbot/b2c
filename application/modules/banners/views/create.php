<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('banners/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('banners/admin/create')?>">Add</a></li>
</ul>
<?php 
	if(isset($message) && !empty($message)){
		?>
		<div class="alert alert-info"><?php echo $message ?></div>
		<?php
	}
?>
<?php 
	$validation_error = validation_errors(); 
	if(!empty($validation_error)){
		?>
		<div class="alert alert-danger"><?php echo $validation_error ?></div>
		<?php
	}
?>
<?php echo form_open_multipart('banners/admin/create') ?><div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
			'class' => 'form-control',
		);
	?>
    <label for="title">Title</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'link',
			'id' 		=> 'link',
			'class' => 'form-control',
		);
	?>
    <label for="link">Link</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'subtitle',
			'id' 		=> 'subtitle',
			'class' => 'form-control',
		);
	?>
    <label for="subtitle">Subtitle</label>
	<?php echo form_input($input);?>
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'sequence',
			'id' 		=> 'sequence',
			'class' => 'form-control',
		);
	?>
    <label for="sequence">Sequence</label>
	<?php echo form_input($input);?>
</div>
<div class="form-group">

<div class="form-group">
	
	<label for="status" >Status</label>
	</div>	
	<select name="status">
		  <option value="" disabled selected style='display:none;'>Select Status...</option>
		  <option value="1">Enable</option>
		  <option value="0">Disable</option>
    </select>
</div>
<div class="form-group">
 <label for="image">Uplode Banner</label>
<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>