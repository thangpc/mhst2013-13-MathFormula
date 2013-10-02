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
			<div class="title"><?php echo $title; ?>
			</div>
			<div style="margin-top: 1px; margin-bottom: 10px; font-size: 18px; color: #666">
				<span class="author">by <a href="<?php echo site_url("account/$posted_by"); ?>"><?php echo $posted_by; ?></a></span>
				<span class="time"><?php echo $time_created; ?></span>
			</div>
			<span id="latex-image">
				<img style="padding: 10px 0 15px 0" id="latex-image" src="http://latex.numberempire.com/render?<?php echo $latex; ?>" alt="show latex to image">
			</span>			
			<div class="embed">
				<a class="down" target="_blank" href="http://latex.numberempire.com/render?<?php echo $latex; ?>">Download this image</a><br>
				<b>Latex raw :</b> 
				<span class="latex-raw">
					<input onclick="this.select()" readonly value="<?php echo $latex; ?>">
				</span>
				<br>
				<b>Link image:</b> 
				<span class="linkimage">
					<input onclick="this.select()" readonly value="http://latex.numberempire.com/render?<?php echo $latex; ?>">
				</span>
				<br>
				<b>Embed to forum:</b> 
				<span class="embedtoforum">
					<input onclick="this.select()" readonly value="[IMG]http://latex.numberempire.com/render?<?php echo $latex; ?>[/IMG]">
				</span>
				<pre id="html-source" style="display: none"></pre>
				<?php
				if ($author == 1) { ?>
				<a class="btn" href="<?php echo site_url("formula/edit-$id"); ?>">Edit</a>
				<?php } ?>
				<a class="btn" href="<?php echo site_url("formula/copy-$id"); ?>">Copy this formula</a>
				<div class="require">
					<span></span>
				</div>
			</div>
			<div style="text-align: right; margin-top: 15px;">
				<span style="color: #333; font-size: 14px; color: #1166aa">Share this</span>
				<span class='st_plusone_hcount' displayText='Google +1'></span>
				<span class='st_fblike_hcount' displayText='Facebook Like'></span>
				<span class='st_facebook_hcount' displayText='Facebook'></span>
				<span class='st_twitter_hcount' displayText='Tweet'></span>
				<span class='st_blogger_hcount' displayText='Blogger'></span>
				<span class='st_email_hcount' displayText='Email'></span>
			</div>
		</div>
		<div style="margin: 0px auto; margin-top: 15px; width: 760px;">
			<!-- facebook comment -->
			<div class="fb-comments" data-href="<?php echo site_url(uri_string()) ?>" data-width="750"></div>
		</div>
	</div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "298d3ee0-8e10-446c-8b51-fccffd5485f9", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>