<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('suppliers/suppliers')?>">List</a></li>
	<li><a href="<?php echo site_url('suppliers/create')?>">Add</a></li>
</ul>
<?php if($supplier->type  == 1){
			$suppliers='Paid';
			}else{
			$suppliers='Free';
			}
			if($supplier->varified  == 1){
			$varifie='Verify';
			}else{
			$varifie='Not Verify';
			} ?>
<table class="table table-bordered"><tr>
	<th>Name</th>
	<td><?php echo $supplier->name?></td>
</tr><tr>
	<th>Email</th>
	<td><?php echo $supplier->email?></td>
</tr><tr>
	<th>Phone</th>
	<td><?php echo $supplier->phone?></td>
</tr><tr>
	<th>Type</th>
	<td><?php echo $suppliers?></td>
</tr><tr>
	<th>Varified</th>
	<td><?php echo $varifie?></td>
</tr><tr>
	<th>About</th>
	<td><?php echo $supplier->about?></td>
</tr><tr>
	<th>Profile Pic</th>
	<td> <img alt="<?php echo $supplier->profile_pic;?>" src="<?php if($supplier->profile_pic == ''){echo base_url('assets/admin/images/wo.jpg');}else{echo base_url('assets/upload/'.$supplier->profile_pic);} ?>" height="50" width="50" /></td>
</tr>

</table>
</div>
</div>