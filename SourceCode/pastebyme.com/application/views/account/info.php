<div class="container raw clearfix cheatsheets">
	<div class="slogan">
		<h2 style="opacity: 1; top: 0px; "><span style="opacity: 1; top: 0px; ">The best</span> math editor online</h2>
	</div>
	<div class="clearfix"></div>
	<div>
		<h2 class="title"><?php echo $title_page; ?></h2>
	</div>
	<div class="content">
		<table class="user-info" cellspacing="0">
		    <tbody>
		    	<tr class="odd-row">
		    		<th>
		    			<img src="<?php echo base_url().'public_html/images/avatars/geek_girl.png'; ?>" alt="">
		    			<a href='#'><?php echo $user; ?></a></th>
		    	</tr>
		    	<tr>
		    		<td><a href="<?php echo site_url('account/change-info'); ?>">change info</a></td>
		    	</tr>
		    	<tr>
		    		<td><a href="<?php echo site_url('account/change-pass'); ?>">change password</a></td>
		    	</tr>
			</tbody>
		</table>
		<div class="video">
			<?php
			foreach ($formulars as $key => $formular) {
			?>		
			<div class="row">
				<h3><?php echo $formular['title']; ?></h3>
				<div>
					<img id="latex-image" src="http://latex.codecogs.com/gif.latex?<?php echo $formular['latex']; ?>" alt="show latex to image">
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div> 

