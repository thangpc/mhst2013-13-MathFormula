<div class="container raw clearfix">
	<div class="slogan">
		<h2 style="opacity: 1; top: 0px; "><span style="opacity: 1; top: 0px; ">The best</span> math editor online</h2>
	</div>
	<p class="note" style="opacity: 1; left: 0px; color: #fff; font-size: 22px">Quick math now</p>
	<p class="rapid" style="opacity: 1; right: 0px; "><a href="<?php echo site_url('cheat-sheets'); ?>">Rapid typing - Cheat sheets</a></p>
	<div id="editor">
		<?php echo form_open('save-formular', 'id="frm_formular" name="frm_formular"'); ?>	
		<span id="editable-math" class="mathquill-editor">
		</span>
		<?php
	        echo form_input('latex-source', set_value('latex-source'), 'id="latex-source" placeholder="latex here"');
		?>
		<div class="clearfix"></div>
		<?php 
	        echo form_input('title', set_value('title'), 'id="title" placeholder="title for this math formular"');
		?>

		<button class="btn" id="preview">Preview</button>
		<button class="btn" id="publish">Publish</button>

		<div class="status" style="margin-left: 300px; margin-top: 30px;"></div>
		<div class="result">
			<div class="title">Preview</div>			
			<a class="down" target="_blank" href="">Download this image</a>
			<span id="latex-image"></span>			
			<br>			
			<b>Link image:</b> <span class="linkimage"></span>
			<br>
			<b>Embed to forum:</b> <span class="embedtoforum"></span>
			<pre id="html-source" style="display: dnone"></pre>

			<div class="require">
				<span></span>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div> 
