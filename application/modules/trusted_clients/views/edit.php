<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('trusted_clients/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('trusted_clients/admin/create')?>">Add</a></li>
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
<?php echo form_open_multipart('trusted_clients/admin/edit/'.$trusted_client->id) ?><div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
			'class' => 'form-control',
			'value' => $trusted_client->title,
		);
	?>
    <label for="title">Title</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'sequence',
			'id' 		=> 'sequence',
			'class' => 'form-control',
			'value' => $trusted_client->sequence,
		);
	?>
    <label for="sequence">Sequence</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
<div class="form-group">
		
	<label for="type" >Type</label></div>
	 
	<select name="status" style="width:138px;">
		  <option value="1"<?php echo $trusted_client->status == "1" ? " selected" : ""; ?>>Enable</option>
		  <option value="0"<?php echo $trusted_client->status == "0" ? " selected" : ""; ?>>Disable</option>
    </select>
</div><div class="form-group">
 <label for="image">Update Banner</label></br>
 <img alt="<?php echo $trusted_client->image;?>" src="<?php echo base_url('assets/upload/trusted_client_images/').'/'.$trusted_client->image;?>" height="50" width="50" />
<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>