<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('users/users')?>">List</a></li>
	<li><a href="<?php echo site_url('users/create')?>">Add</a></li>
</ul>
<table class="table table-bordered"><tr>
	<th>Name</th>
	<td><?php echo $user->name?></td>
</tr><tr>
	<th>Email</th>
	<td><?php echo $user->email?></td>
</tr><tr>
	<th>Contact</th>
	<td><?php echo $user->contact?></td>
</tr><tr>
	<th>Firstname</th>
	<td><?php echo $user->firstname?></td>
</tr><tr>
	<th>Surname</th>
	<td><?php echo $user->surname?></td>
</tr><tr>
	<th>Stret No</th>
	<td><?php echo $user->stret_no?></td>
</tr><tr>
	<th>Password</th>
	<td><?php echo $user->password?></td>
</tr><tr>
	<th>Building Name</th>
	<td><?php echo $user->building_name?></td>
</tr><tr>
	<th>Street</th>
	<td><?php echo $user->street?></td>
</tr><tr>
	<th>Suburb</th>
	<td><?php echo $user->suburb?></td>
</tr><tr>
	<th>City</th>
	<td><?php echo $user->city?></td>
</tr><tr>
	<th>Country</th>
	<td><?php echo $user->country?></td>
</tr><tr>
	<th>Image</th>
	<td> <img alt="<?php echo $user->image;?>" src="<?php if($user->image == ''){echo base_url('assets/admin/images/wo.jpg');}else{echo base_url('assets/upload/'.$user->image);} ?>" height="50" width="50" />
</td>
</tr>

</table>
</div>
</div>