<div class="container raw clearfix cheatsheets">
	<div class="slogan">
		<h2 style="opacity: 1; top: 0px; "><span style="opacity: 1; top: 0px; ">The best</span> math editor online</h2>
	</div>
	<div class="clearfix"></div>
	<div>
		<h2 class="title"><?php echo $title_page; ?></h2>
	</div>
	<div class="content list-formula">
		<?php
		if (count($formulas) != 0) {
		foreach ($formulas as $key => $val) {
			$id = $val['f_id'];
		?>
		<div class="row">
			<h3><a href="<?php echo site_url("formula/view-$id"); ?>"><?php echo $val['title']; ?></a></h3>

			<div style="margin: 10px 0 10px 0">
				<img src="http://latex.numberempire.com/render?<?php echo $val['latex']; ?>" alt="">
			</div>
			<?php if ($val['user'] != '') { ?>
			<span class="author">by <a href="<?php echo site_url("account/".$val['user']); ?>"><?php echo $val['user']; ?></a></span>
			<?php } ?>
			<span class="time"><?php echo $val['time_created']; ?></span>
		</div>
		<?php
		}
		?>
		<?php echo $pages; ?>
		<div class="clearfix"></div>
		<?php
		}
		?>
	</div>
</div>