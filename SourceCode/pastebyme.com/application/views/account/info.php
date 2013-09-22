<div class="container raw clearfix cheatsheets">
	<div class="slogan">
		<h2 style="opacity: 1; top: 0px; "><span style="opacity: 1; top: 0px; ">The best</span> math editor online</h2>
	</div>
	<div class="clearfix"></div>
	<div>
		<h2 class="title"><?php echo $title_page; ?></h2>
	</div>
	<div class="content">
		<?php echo $col_left; ?>
		<div class="video list-formular">
			<h2 style="margin-bottom: 15px">Recent posts</h2>
			<?php	

			if (count($formulars) != 0) {
			foreach ($formulars as $key => $formular) {				
			?>

			<div class="row">
				<h3><a href="<?php echo site_url("formular/view-".$formular['f_id']); ?>"><?php echo $formular['title']; ?></a></h3>
				<div style="margin: 10px 0 10px 0">
					<img id="latex-image" src="http://latex.codecogs.com/gif.latex?<?php echo $formular['latex']; ?>" alt="show latex to image">
				</div>
				<span class="time"><?php echo $formular['time_created']; ?></span>
			</div>			
		
			<?php
			}
			?>
			<?php echo $pages; ?>
			<div class="clearfix"></div>
			<?php
			} else {
			?>
			<h4 style="color: #2C99DB">No activity</h4>
			<?php
			}
			?>
		</div>
	</div>
</div> 

