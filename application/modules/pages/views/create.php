<script src='<?php echo base_url('assets/admin/tinymce/js/tinymce/tinymce.min.js');?>'></script>
  <script>
 tinymce.init({
  selector: 'textarea'  // change this value according to your HTML
  
});
</script>
<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('pages/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('pages/admin/create')?>">Add</a></li>
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
<?php echo form_open_multipart('pages/admin/create') ?><div class="form-group">
	<?php
		$input = array(
			'name' => 'page_title',
			'id' 		=> 'page_title',
			'class' => 'form-control',
		);
	?>
    <label for="page_title">Page Title</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'slug',
			'id' 		=> 'slug',
			'class' => 'form-control',
		);
	?>
    <label for="slug">Slug</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'short_content',
			'id' 		=> 'short_content',
			'class' => 'form-control',
		);
	?>
    <label for="short_content">Short Content</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'content',
			'id' 		=> 'content1',
			'class' => 'form-control',
		);
	?>
    <label for="content">Content</label>
	<?php echo form_textarea($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_keyword',
			'id' 		=> 'meta_keyword',
			'class' => 'form-control',
		);
	?>
    <label for="meta_keyword">Meta Keyword</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_description',
			'id' 		=> 'meta_description',
			'class' => 'form-control',
		);
	?>
    <label for="meta_description">Meta Description</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	
    <label for="image">Image</label>
	<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>

