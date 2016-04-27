<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('product/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('product/admin/create')?>">Add</a></li>
</ul>

<?php // print'<pre>';print_r($product);die; 
	if($product->type  == 1){
			$type='Service';
			}else{
			$type='Product';
			} ?>
<table class="table table-bordered"><tr>
	<th>Type</th>
	<td><?php echo $type?></td>
</tr><tr>
	<th>Name</th>
	<td><?php echo $product->name?></td>
</tr><tr>
	<th>Slug</th>
	<td><?php echo $product->slug?></td>
</tr><tr>
	<th>Price</th>
	<td><?php echo $product->price?></td>
</tr><tr>
	<th>Description</th>
	<td><?php echo $product->description?></td>
</tr><tr>
	<th>Creation Date</th>
	<td><?php echo $product->creation_date?></td>
</tr>
</table>
<table class="table table-bordered">
<hr >
<h4 style="color:black;">Product Gallery</h4> 
<hr><tr>
	<th>Title</th>
	<td><?php echo $product->title?></td>
</tr><tr>
<th>Product Image</th>
<td>
	<?php foreach($product_images as $product_image) { ?>

	<img class="img-rounded"  style="width:190px;height:142px;" 
	src="<?php echo base_url().$product_image->image_path?>">
	
<?php } ?>

</td>
</table>
</div>
</div>