<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('category_management/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('category_management/admin/create')?>">Add</a></li>
</ul>
<table class="table table-bordered"><tr>
	<th>Name</th>
	<td><?php echo $category->name?></td>
</tr><tr>
	<th>Slug</th>
	<td><?php echo $category->slug?></td>
</tr><!--tr>
	<th>Parent Id</th>
	<td><?php echo $category->parent_id?></td>
</tr--><tr>
	<th>Description</th>
	<td><?php echo $category->description?></td>
</tr><tr>
	<th>Image</th>
	<td><img alt="<?php echo $category->image;?>" src="<?php if($category->image == ''){echo base_url('assets/admin/images/noimage.png');}else{echo base_url('assets/upload/category_image/'.$category->image);} ?>" height="100" width="100" /></td>
</tr>

</table>
</div>
</div>