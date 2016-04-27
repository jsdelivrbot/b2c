<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('suppliers/suppliers')?>">List</a></li>
	<li><a href="<?php echo site_url('suppliers/create')?>">Add</a></li>
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

	$this->table->set_heading('Name','Email','Phone','Profile Pic','Type','Varified','Action');
	foreach($suppliers as $supplier){
			if($supplier->type  == 1){
			$suppliers='Paid';
			}else{
			$suppliers='Free';
			}
			if($supplier->varified  == 1){
			$varifie='Verify';
			}else{
			$varifie='Not Verify';
			}

			if($supplier->profile_pic == ''){

				$img=base_url().'assets/admin/images/wo.jpg';
			}else{

				$img=base_url().'assets/upload/'.$supplier->profile_pic;
			}
		
		$links = anchor('suppliers/view/'.$supplier->id,'view',array('title'=>'View Supplier','class'=>'btn btn-sm btn-success'));
		$links .= ' | '.anchor('suppliers/edit/'.$supplier->id,'edit',array('title'=>'Edit Supplier','class'=>'btn btn-sm btn-warning'));
		$links .= ' | '.anchor('suppliers/remove/'.$supplier->id,'remove',array('title'=>'remove Supplier','class'=>'btn btn-sm btn-danger'));
		$image = "<img class='img-circle' src='$img'  width='70px' height=70px >";
		$this->table->add_row($supplier->name,$supplier->email,$supplier->phone,$image,$suppliers,$varifie,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('suppliers/index/'.$i)?>"><?php echo $i ?></a></li>
		<?php
	}
?>
</ul>
</div>
</div>