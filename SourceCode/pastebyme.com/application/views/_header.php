<header>
	<div class="raw">
		<h1>	
			<a href="<?php echo site_url('home'); ?>" style="color: #F36957">
				<img src="<?php echo base_url().'public_html/images/logo.png'; ?>" alt="">
			</a>
		</h1>
		<?php $current_nav = $this->uri->segment(1); ?>
		<nav class="" role="navigation">
		    <ul>
		        <li><a <?php if ($current_nav == 'community') echo 'class="current"'; ?> href="<?php echo site_url('community'); ?>">Community</a></li>
		        <li><a <?php if ($current_nav == 'cheat-sheets') echo 'class="current"'; ?> href="<?php echo site_url('cheat-sheets'); ?>">Cheat sheets</a></li>
		     	<li><a <?php if ($current_nav == 'contact-us') echo 'class="current"'; ?> href="<?php echo site_url('contact-us'); ?>">Contact</a></li>
		     	<?php
		     	if ($this->user_model->loggedin('user') != 'public') {		     	
		     	?>
		     	<li><a <?php if ($current_nav == 'login') echo 'class="current"'; ?> href="<?php echo site_url('login'); ?>">SignIn</a></li>
		     	<li><a <?php if ($current_nav == 'sign-up') echo 'class="current"'; ?> href="<?php echo site_url('sign-up'); ?>">SignUp</a></li>
		     	<?php } else { 
		     		$user = $this->session->userdata('user');
		     	?>
		     	<li><a <?php if ($current_nav == 'account') echo 'class="current"'; ?> href="<?php echo site_url("account/$user/1"); ?>"><?php echo $user; ?></a></li>
		     	<li><a href="<?php echo site_url('logout'); ?>">Logout</a></li>
		     	<?php } ?>
		    </ul>
		</nav>
	</div>
	
</header>