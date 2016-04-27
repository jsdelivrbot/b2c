<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('pages/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('pages/admin/create')?>">Add</a></li>
</ul>
<?php if($pages->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			} ?>
<table class="table table-bordered"><tr>
	<th>Page Title</th>
	<td><?php echo $pages->page_title?></td>
</tr><tr>
	<th>Slug</th>
	<td><?php echo $pages->slug?></td>
</tr><tr>
	<th>Short Content</th>
	<td><?php echo $pages->short_content?></td>
</tr><tr>
	<th>Content</th>
	<td><?php echo $pages->content?></td>
</tr><tr>
	<th>Image</th>
	<td> <img alt="<?php echo $pages->images;?>" src="<?php echo base_url('assets/upload/').'/'.$pages->images;?>" height="50" width="50" />
</td>
</tr><tr>
	<th>Meta Keyword</th>
	<td><?php echo $pages->meta_keyword?></td>
</tr><tr>
	<th>Meta Description</th>
	<td><?php echo $pages->meta_description?></td>
</tr><tr>
	<th>Status</th>
	<td><?php echo $status?></td>
</tr><tr>
	<th>Created On</th>
	<td><?php echo $pages->created_on?></td>
</tr><tr>
	<th>Updated On</th>
	<td><?php echo $pages->updated_on?></td>
</tr>
</table>
</div>
</div>