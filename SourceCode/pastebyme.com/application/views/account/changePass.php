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
		<div class="changePassArea">
			<?php echo form_open('check-sign-up', 'id="frm_signup"'); ?>
		              
		       <?php 
		          echo form_input('username', set_value('username'), 'id="username" autofocus placeholder="Old Password"');
		       ?>
		    <br>
		       <?php 
		          echo form_password('password', '', 'id="password" placeholder="New Password"');
		       ?>
            <br>
               <?php 
                  echo form_input('email', '', 'id="email" placeholder="Re-enter Password"');
               ?>
		    <br>
		       <?php echo form_submit('submit', 'Update', 'id="btn-signup"'); ?>
		    <div class="status"></div>
		    <?php echo form_close(); ?>
            <br>
		    <?php echo validation_errors(); ?>
		</div>
	</div>
</div> 

