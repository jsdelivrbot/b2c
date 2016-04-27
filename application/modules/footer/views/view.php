<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('footer/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('footer/admin/create')?>">Add</a></li>
</ul>
<table class="table table-bordered"><tr>
	<th>Type</th>
	<td><?php echo $footer->type?></td>
</tr><tr>
	<th>Value</th>
	<td><?php echo $footer->value?></td>
</tr>

</table>
</div>
</div>