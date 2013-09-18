<div class="container raw clearfix cheatsheets">
	<div class="slogan">
		<h2 style="opacity: 1; top: 0px; "><span style="opacity: 1; top: 0px; ">The best</span> math editor online</h2>
	</div>
	<div class="clearfix"></div>
	<div>
		<h2 class="title"><?php echo $title_page; ?></h2>
	</div>
	<div class="content list-formular">
		<?php
		foreach ($formulars as $key => $val) {
			$id = $val['f_id'];
		?>
		<div class="row">
			<h3><a href="<?php echo site_url("formular/view-$id"); ?>"><?php echo $val['title']; ?></a></h3>
			<div>
				<img src="http://latex.codecogs.com/gif.latex?<?php echo $val['latex']; ?>" alt="">
			</div>
		</div>
		<?php
		}
		?>
		<?php echo $pages; ?>
	</div>
</div