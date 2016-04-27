<ul class="pager">
	<li><a href="<?php echo site_url('trusted_clients/')?>">List</a></li>
	<li><a href="<?php echo site_url('trusted_clients/create')?>">Add</a></li>
</ul>
<table class="table table-bordered"><tr>
	<th>Title</th>
	<td><?php echo $trusted_client->title?></td>
</tr><tr>
	<th>Sequence</th>
	<td><?php echo $trusted_client->sequence?></td>
</tr><tr>
	<th>Image</th>
	<td><?php echo $trusted_client->image?></td>
</tr><tr>
	<th>Status</th>
	<td><?php echo $trusted_client->status?></td>
</tr>

</table>