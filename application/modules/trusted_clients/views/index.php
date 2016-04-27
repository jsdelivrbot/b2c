<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('trusted_clients/admin/')?>">List</a></li>
	<li><a href="<?php echo site_url('trusted_clients/admin/create')?>">Add</a></li>
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

	$this->table->set_heading('Title','Sequence','Image','Status','Action');
	foreach($trusted_clients as $trusted_client){

		if($trusted_client->status  == 1){
				$statu =anchor('trusted_clients/admin/setstatus?status=0'.'&'.'id='.$trusted_client->id,'Enable',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('trusted_clients/admin/setstatus?status=1'.'&'.'id='.$trusted_client->id,'Disable',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}
		if($trusted_client->image == ''){

				$img=base_url().'assets/admin/images/noimage.png';
			}else{

				$img=base_url().'assets/upload/trusted_client_images/'.$trusted_client->image;
			}

		$image = "<img class='img-circle' src='$img'  width='70px' height=70px >";
		$links = anchor('trusted_clients/admin/view/'.$trusted_client->id,'view',array('title'=>'View Trusted Client','class'=>'btn btn-sm btn-success'));
		$links .= ' | '.anchor('trusted_clients/admin/edit/'.$trusted_client->id,'edit',array('title'=>'Edit Trusted Client','class'=>'btn btn-sm btn-warning'));
		$links .= ' | '.anchor('trusted_clients/admin/remove/'.$trusted_client->id,'remove',array('title'=>'remove Trusted Client','class'=>'btn btn-sm btn-danger'));
		
		$this->table->add_row($trusted_client->title,$trusted_client->sequence,$image,$statu,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('trusted_clients/admin/index/'.$i)?>"><?php echo $i ?></a></li>
		<?php
	}
?>
</ul>
</div>
</div>