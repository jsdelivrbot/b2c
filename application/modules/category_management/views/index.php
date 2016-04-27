<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('category_management/admin/')?>">List</a></li>
	<li><a href="<?php echo site_url('category_management/admin/create')?>">Add</a></li>
</ul>
<?php
$url=base_url();
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
//print'<pre>';print_r($category);die;
	$this->table->set_heading('Name','Slug','Images','Description','Action');
	foreach($category as $category){
         
            if($category->image == ''){

				$img=base_url().'assets/admin/images/noimage.png';
			}else{

				$img=base_url().'assets/upload/category_image/'.$category->image;
			}

		$image = "<img class='img-circle' src='$img'  width='80px' height=80px >";


		$links = anchor('category_management/Admin/view/'.$category->id,'view',array('title'=>'View Category','class'=>'btn btn-sm btn-success'));
		$links .= ' | '.anchor('category_management/admin/edit/'.$category->id,'edit',array('title'=>'Edit Category','class'=>'btn btn-sm btn-warning'));
		$links .= ' | '.anchor('category_management/admin/remove/'.$category->id,'remove',array('title'=>'remove Category','class'=>'btn btn-sm btn-danger'));
		
		$this->table->add_row($category->name,$category->slug,$image,$category->description,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('category_management/admin/index/'.$i)?>"><?php echo $i ?></a></li>
		<?php
	}
?>
</ul>
</div>
</div>