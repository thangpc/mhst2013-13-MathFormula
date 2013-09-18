<div class="container raw clearfix cheatsheets">
	<div class="slogan">
		<h2 style="opacity: 1; top: 0px; "><span style="opacity: 1; top: 0px; ">The best</span> math editor online</h2>
	</div>
	<div class="clearfix"></div>
	<div>
		<h2 class="title"><?php echo $title_page; ?></h2>
	</div>
	<div class="content">
		<div class="result" style="display: block">
			<div class="title"><?php echo $title; ?></div>			
			<a class="down" target="_blank" href="http://latex.codecogs.com/gif.latex?<?php echo $latex; ?>">Download this image</a>
			<span id="latex-image">
				<img id="latex-image" src="http://latex.codecogs.com/gif.latex?<?php echo $latex; ?>" alt="show latex to image">
			</span>			
			<br>			
			<b>Link image:</b> 
			<span class="linkimage">
				<input readonly value="http://latex.codecogs.com/gif.latex?<?php echo $latex; ?>">
			</span>
			<br>
			<b>Embed to forum:</b> 
			<span class="embedtoforum">
				<input readonly value="[IMG]http://latex.codecogs.com/gif.latex?<?php echo $latex; ?>[/IMG]">
			</span>
			<pre id="html-source" style="display: none"></pre>
			<?php
			if ($author == 1) { ?>
			<a class="btn" href="<?php echo site_url("formular/edit-$id"); ?>">Edit</a>
			<?php } ?>
			<a class="btn" href="<?php echo site_url("formular/copy-$id"); ?>">Copy this formular</a>
			<div class="require">
				<span></span>
			</div>
		</div>

	</div>
</div>