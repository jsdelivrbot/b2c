<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('pages/admin/')?>">List</a></li>
	<li><a href="<?php echo site_url('pages/admin/create')?>">Add</a></li>
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

	$this->table->set_heading('Page Title','Slug','Status','Created On','Updated On','Action');
	foreach($pages as $pages){
		
		if($pages->status  == 1){
				$statu =anchor('pages/admin/setstatus?status=0'.'&'.'id='.$pages->id,'Enable',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('pages/admin/setstatus?status=1'.'&'.'id='.$pages->id,'Disable',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}
		
		$links = anchor('pages/admin/view/'.$pages->id,'view',array('title'=>'View pages','class'=>'btn btn-sm btn-success'));
		$links .= ' | '.anchor('pages/admin/edit/'.$pages->id,'edit',array('title'=>'Edit pages','class'=>'btn btn-sm btn-warning'));
		$links .= ' | '.anchor('pages/admin/remove/'.$pages->id,'remove',array('title'=>'remove pages','class'=>'btn btn-sm btn-danger'));
		
		$this->table->add_row($pages->page_title,$pages->slug,$statu,$pages->created_on,$pages->updated_on,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('pages/admin/index/'.$i)?>"><?php echo $i ?></a></li>
		<?php
	}
?>
</ul>
</div>
</div>