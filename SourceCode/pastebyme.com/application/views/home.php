<div class="container raw clearfix">
	<div class="slogan">
		<h2 style="opacity: 1; top: 0px; "><span style="opacity: 1; top: 0px; ">The best</span> math editor online</h2>
	</div>
	<p class="note" style="opacity: 1; left: 0px; color: #fff; font-size: 22px">Quick math now</p>
	<p class="rapid" style="opacity: 1; right: 0px; "><a href="<?php echo site_url('cheat-sheets'); ?>">Rapid typing - Cheat sheets</a></p>
	<div id="editor">
		<form id="frm_math">
		<span id="editable-math" class="mathquill-editor">
			\frac{d}{dx}\sqrt{x} = \frac{d}{dx}x^{\frac{1}{2}} = \frac{1}{2}x^{-\frac{1}{2}} = \frac{1}{2\sqrt{x}}
		</span>
		<input id="latex-source" placeholder="latex here" style="display: block">
		<div class="clearfix"></div>
		<input id="title" placeholder="title for this math formular">

		<button class="btn-submit preview">Preview</button>
		<button class="btn-submit publish">Publish</button>

		<div id="loading-ajax"></div>
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
		</form>
	</div>
</div> 
