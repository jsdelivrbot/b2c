<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('product/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('product/admin/create')?>">Add</a></li>
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

	//$this->table->set_heading('Title','Type','Name','Slug','Price','Creation Date','Action');
	$this->table->set_heading('Type','Name','Slug','Price','Creation Date','Action');
			//print'<pre>';print_r($product);die;
	foreach($product as $product){
		
		if($product->type  == 1){
			$type='Service';
			}else{
			$type='Product';
			}
		
		$links = anchor('product/admin/view/'.$product->id,'view',array('title'=>'View Product','class'=>'btn btn-sm btn-success'));
		$links .= ' | '.anchor('product/admin/edit/'.$product->id,'edit',array('title'=>'Edit Product','class'=>'btn btn-sm btn-warning'));
		$links .= ' | '.anchor('product/admin/remove/'.$product->id,'remove',array('title'=>'remove Product','class'=>'btn btn-sm btn-danger'));
		
		$this->table->add_row($type,$product->name,$product->slug,$product->price,$product->creation_date,$links);
		//$this->table->add_row($product->title,$type,$product->name,$product->slug,$product->price,$product->creation_date,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('product/admin/index/'.$i)?>"><?php echo $i ?></a></li>
		<?php
	}
?>
</ul>
</div>
</div>