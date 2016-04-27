<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('header/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('header/admin/create')?>">Add</a></li>
</ul>
<table class="table table-bordered" style="width:75%;"><tr>
	<th >Type</th>
	<td><?php echo $header->type?></td>
</tr><tr>
	<th>Value</th>
	<td><?php echo $header->value?></td>
</tr>

</table>
</div>
</div>