<div class="container raw clearfix cheatsheets">
	<div class="slogan">
		<h2 style="opacity: 1; top: 0px; "><span style="opacity: 1; top: 0px; ">The best</span> math editor online</h2>
	</div>
	<div class="clearfix"></div>
	<div>
		<h2 class="title"><?php echo $title_page; ?></h2>
	</div>
	<div class="content">
		<div id="editor" style="margin-top: 10px;">
			<?php echo form_open('save-formular', 'id="frm_formular" name="frm_formular"'); ?>	
			<span id="editable-math" class="mathquill-editor">
				<?php echo $latex; ?>
			</span>
			<input type="text" placeholder="latex here" autofocus="" id="latex-source" value="<?php echo $latex; ?>" name="latex-source">
			<div class="clearfix"></div>
			<input type="text" placeholder="title for this math formular" autofocus="" id="title" value="<?php echo $title; ?>" name="title">

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
				<pre id="html-source" style="display: none"></pre>

				<div class="require">
					<span></span>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>