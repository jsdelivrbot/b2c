<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('trusted_clients/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('trusted_clients/admin/create')?>">Add</a></li>
</ul>
<table class="table table-bordered"><tr>
	<th>Title</th>
	<td><?php echo $trusted_client->title?></td>
</tr><tr>
	<th>Sequence</th>
	<td><?php echo $trusted_client->sequence?></td>
</tr><tr>
	<th>Image</th>
	<td> <img alt="<?php echo $trusted_client->image;?>" src="<?php if($trusted_client->image == ''){echo base_url('assets/admin/images/BAnner.png');}else{echo base_url('assets/upload/trusted_client_images/'.$trusted_client->image);} ?>" height="100" width="100" />
</td>
</tr><tr>
	<th>Status</th>
	<td><?php echo $trusted_client->status?></td>
</tr>

</table>
</div>
</div>