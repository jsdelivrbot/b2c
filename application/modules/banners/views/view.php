<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('banners/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('banners/admin/create')?>">Add</a></li>
</ul>
<?php if($tbl_banner->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			}?>
<table class="table table-bordered"><tr>
	<th>Title</th>
	<td><?php echo $tbl_banner->title?></td>
</tr><tr>
	<th>Link</th>
	<td><?php echo $tbl_banner->link?></td>
</tr><tr>
	<th>Subtitle</th>
	<td><?php echo $tbl_banner->subtitle?></td>
</tr><tr>
	<th>Image</th>
	<td> <img alt="<?php echo $tbl_banner->image;?>" src="<?php if($tbl_banner->image == ''){echo base_url('assets/admin/images/BAnner.png');}else{echo base_url('assets/upload/banner_image/'.$tbl_banner->image);} ?>" height="100" width="100" />
</td>
</tr><tr>
	<th>Sequence</th>
	<td><?php echo $tbl_banner->sequence?></td>
</tr><tr>
	<th>Status</th>
	<td><?php echo $status?></td>
</tr><tr>
	<th>Created On</th>
	<td><?php echo $tbl_banner->created_on?></td>
</tr><tr>
	<th>Updated On</th>
	<td><?php echo $tbl_banner->updated_on?></td>
</tr>

</table>
</div>
</div>