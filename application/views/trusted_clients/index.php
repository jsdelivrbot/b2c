<ul class="pager">
	<li><a href="<?php echo site_url('trusted_clients/')?>">List</a></li>
	<li><a href="<?php echo site_url('trusted_clients/create')?>">Add</a></li>
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

	$this->table->set_heading('Title','Sequence','Image','Status');
	foreach($trusted_clients as $trusted_client){
		$links = anchor('trusted_clients/view/'.$trusted_client->id,'view',array('title'=>'View Trusted_client','class'=>'btn btn-sm btn-success'));
		$links .= ' | '.anchor('trusted_clients/edit/'.$trusted_client->id,'edit',array('title'=>'Edit Trusted_client','class'=>'btn btn-sm btn-warning'));
		$links .= ' | '.anchor('trusted_clients/remove/'.$trusted_client->id,'remove',array('title'=>'remove Trusted_client','class'=>'btn btn-sm btn-danger'));
		
		$this->table->add_row($trusted_client->title,$trusted_client->sequence,$trusted_client->image,$trusted_client->status,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('trusted_clients/index/'.$i)?>"><?php echo $i ?></a></li>
		<?php
	}
?>
</ul>