<script src='<?php echo base_url('assets/admin/tinymce/js/tinymce/tinymce.min.js');?>'></script>
  <script>
 tinymce.init({
  selector: 'textarea'  // change this value according to your HTML
  
});
</script>
<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('category_management/admin/')?>">List</a></li>
	<!--li><a href="<?php echo site_url('category_management/admin/create')?>">Add</a></li-->
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
<?php echo form_open_multipart('category_management/admin/create') ?><div class="form-group">
<label for="name">Parent Category</label>	
<?php  
//print'<pre>';print_r($category);die;

echo '<select name=parent_id style="width: 175px;">';
          foreach($category as $categorys){ ?>

			echo'<option value="<?php echo $categorys->id ?>'"><?php echo $categorys->name ?></option>';

<?php }
			echo '</select>'
?>		

</div>
	
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'name',
			'id' 		=> 'name',
			'class' => 'form-control',
		);
	?>
    <label for="name">Name</label>
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
</div><!--div class="form-group">
	<?php
		$input = array(
			'name' => 'parent_id',
			'id' 		=> 'parent_id',
			'class' => 'form-control',
		);
	?>
    <label for="parent_id">Parent Id</label>
	<?php echo form_input($input);?>
</div--><div class="form-group">
	<?php
		$input = array(
			'name' => 'description',
			'id' 		=> 'description',
			'class' => 'form-control',
		);
	?>
    <label for="description">Description</label>
	<?php echo form_textarea($input);?>
</div><div class="form-group">
	
    <label for="image">Image</label>
	<input type="file" name="fileToUpload" id="fileToUpload">
</div>

<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>