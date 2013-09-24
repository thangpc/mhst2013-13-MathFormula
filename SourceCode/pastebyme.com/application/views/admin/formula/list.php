<div class="container">
	<ol class="breadcrumb">
	  <li><a href="<?php echo site_url('admin') ?>">Dashboard</a></li>
	  <li><a href="<?php echo site_url('admin/formula') ?>">Fomular</a></li>
	  <li class="active"><?php echo $title_page; ?></li>
	</ol>
	<?php
		if (count($formulas) != 0) { ?>
	<table class="table table-striped">
		<tr>
			<th width="120">Date</th>
			<th>Title</th>
			<th>Formula</th>
			<th>Posted by</th>
			<th>Action</th>
		</tr>
		<?php
		foreach ($formulas as $key => $val) {
			$id = $val['f_id'];
		?>
		<tr class="row-<?php echo $id; ?>">
			<td><?php echo $val['time_created']; ?></td>
			<td><a target="_blank" href="<?php echo site_url("formula/view-$id"); ?>"><?php echo $val['title']; ?></a></td>
			<td><img src="http://latex.numberempire.com/render?<?php echo $val['latex']; ?>" alt=""></td>
			<td><a target="_blank" href="<?php echo site_url("account/".$val['user']); ?>"><?php echo $val['user']; ?></a></td>
			<td><a href="#" id="<?php echo $id; ?>" class="btn-delete-formula">Delete</a></td>
		</tr>

		<?php
		}
		?>
	</table>	

		<?php echo $pages; ?>
		<div class="clearfix"></div>
		<?php
		}
		?></div>