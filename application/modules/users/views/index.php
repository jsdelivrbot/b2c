<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('users/users')?>">List</a></li>
	<li><a href="<?php echo site_url('users/create')?>">Add</a></li>
</ul>
<?php

	$template = array(
        'table_open'            => '<table class="table table-stripped table-bordered">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);

	$this->table->set_template($template);
//print'<pre>';print_r ($users); die;
	$this->table->set_heading('Name','Email','Contact','Profile Pic','City','Country','Action');
	
	foreach($users as $user){

			if($user->image == ''){

				$img=base_url().'assets/admin/images/wo.jpg';
			}else{

				$img=base_url().'assets/upload/'.$user->image;
			}


		$links = anchor('users/users/view/'.$user->user_id,'view',array('title'=>'View User','class'=>'btn btn-sm btn-success'));
		$links .= ' | '.anchor('users/edit/'.$user->user_id,'edit',array('title'=>'Edit User','class'=>'btn btn-sm btn-warning'));
		$links .= ' | '.anchor('users/remove/'.$user->user_id,'remove',array('title'=>'remove User','class'=>'btn btn-sm btn-danger'));
		
		$image = "<img class='img-circle' src='$img'  width='70px' height=70px >";
		$this->table->add_row($user->name,$user->email,$user->contact,$image,$user->city,$user->country,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('users/index/'.$i)?>"><?php echo $i ?></a></li>
		<?php
	}
?>
</ul>
</div>
</div>