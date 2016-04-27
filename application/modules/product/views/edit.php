<script src='<?php echo base_url('assets/admin/tinymce/js/tinymce/tinymce.min.js');?>'></script>
  <script>
 tinymce.init({
  selector: 'textarea'  // change this value according to your HTML
  
});
</script>
<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('product/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('product/admin/create')?>">Add</a></li>
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
	//print'<pre>';print_r($product);die;
?>
<?php echo form_open_multipart('product/admin/edit/'.$product->p_id) ?><div class="form-group">
	<div class="form-group">
		
	<label for="type" >Type</label>
	  <em class="important">*</em>&nbsp
	<select name="type">
		  <option value="1"<?php echo $product->type == "1" ? " selected" : ""; ?>>Services</option>
		  <option value="0"<?php echo $product->type == "0" ? " selected" : ""; ?>>Product</option>
    </select>
   
	<?php echo form_error('type', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'name',
			'id' 		=> 'name',
			'class' => 'form-control',
			'value' => $product->name,
		);
	?>
    <label for="name">Name</label>
	<?php echo form_input($input);?>
	<?php echo form_error('name', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'slug',
			'id' 		=> 'slug',
			'class' => 'form-control',
			'value' => $product->slug,
		);
	?>
    <label for="slug">Slug</label>
	<?php echo form_input($input);?>
	<?php echo form_error('slug', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'price',
			'id' 		=> 'price',
			'class' => 'form-control',
			'value' => $product->price,
		);
	?>
    <label for="price">Price</label>
	<?php echo form_input($input);?>
	<?php echo form_error('price', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'description',
			'id' 		=> 'description',
			'class' => 'form-control',
			'value' => $product->description,
		);
	?>
    <label for="description">Description</label>
	<?php echo form_textarea($input);?>
	<?php echo form_error('description', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div>
<hr >

<h4 style="color:black;">Product Gallery</h4> 
<hr>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
			'class' => 'form-control',
			'value' => $product->title,
		);
	?>
    <label for="description">Title</label>
	  <em class="important">*</em>
	<?php echo form_input($input);?>
	<?php echo form_error('title', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
</div><div class="form-group">
<label for="description">Select Any Image</label>
</div><div class="form-group">
<?php foreach($product_images as $product_image) { ?>
	<input type="radio" name="default" value="1"/><img  class="img-rounded" alt="Product Images" src="<?php echo base_url().$product_image->image_path?>" width="100" height="100" />

	 <?php } ?>
	</div><div class="form-group">
    <label for="image">Image</label>
	  <em class="important">*</em>
	  <input type="file" multiple="" name="userfile[]" id="file">
	  </div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>