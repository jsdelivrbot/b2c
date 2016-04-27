<ul class="pager">
	<li><a href="<?php echo site_url('trusted_clients/')?>">List</a></li>
	<li><a href="<?php echo site_url('trusted_clients/create')?>">Add</a></li>
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
<?php echo form_open('trusted_clients/edit/'.$trusted_client->id) ?><div class="form-group">
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
	<?php
		$input = array(
			'name' => 'image',
			'id' 		=> 'image',
			'class' => 'form-control',
			'value' => $trusted_client->image,
		);
	?>
    <label for="image">Image</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'status',
			'id' 		=> 'status',
			'class' => 'form-control',
			'value' => $trusted_client->status,
		);
	?>
    <label for="status">Status</label>
	<?php echo form_input($input);?>
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>