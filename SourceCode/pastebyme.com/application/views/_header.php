<header>
	<div class="raw">
		<h1>	
			<a href="<?php echo site_url(''); ?>" style="color: #F36957">Pastebyme.com</a>
		</h1>
		<nav class="" role="navigation">
		    <ul>
		        <li><a href="<?php echo site_url('community'); ?>">Community</a></li>
		        <li><a href="<?php echo site_url('cheat-sheets'); ?>">Cheat sheets</a></li>
		     	<li><a href="<?php echo site_url('contact-us'); ?>">Contact</a></li>
		     	<?php
		     	if (! isset($_SESSION['username']) ) {		     	
		     	?>
		     	<li><a href="<?php echo site_url('login'); ?>">SignIn</a></li>
		     	<li><a href="<?php echo site_url('sign-up'); ?>">SignUp</a></li>
		     	<?php } else { 
		     		$user = $_SESSION['username'];
		     	?>
		     	<li><a href="<?php echo site_url("account/$user"); ?>"><?php echo $user; ?></a></li>
		     	<li><a href="<?php echo site_url('logout'); ?>">Logout</a></li>
		     	<?php } ?>
		    </ul>
		</nav>
	</div>
	
</header>