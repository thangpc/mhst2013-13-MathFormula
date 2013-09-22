<style type="text/css">
    form {
        position: relative;
        font-family: 'Raleway', 'Lato', Arial, sans-serif;
        color: #333;
        text-shadow: 0 2px 1px 
        rgba(0,0,0,0.3);
    }
    input[type="text"], input[type="password"] {
        width: 280px;
        padding: 8px 4px 8px 10px;
        margin-bottom: 15px;
        border: 1px solid #4e3043;
        border: 1px solid rgba(78,48,67, 0.8);
        background: rgba(0,0,0,0.15);
        border-radius: 2px;
        box-shadow: 0 1px 0 rgba(255,255,255,0.2), inset 0 1px 1px rgba(0,0,0,0.1);
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
        font-family: 'Raleway', 'Lato', Arial, sans-serif;
        color: #333;
        font-size: 18px;
    }
    input[type="submit"] {
        width: 296px;
        padding: 8px 5px;
        background: #634056;
        background: -moz-linear-gradient(
        rgba(99,64,86,0.5), 
        rgba(76,49,65,0.7));
        background: -ms-linear-gradient(
        rgba(99,64,86,0.5), 
        rgba(76,49,65,0.7));
        background: -o-linear-gradient(
        rgba(99,64,86,0.5), 
        rgba(76,49,65,0.7));
        background: -webkit-gradient(linear, 0 0, 0 100%, from(
        rgba(99,64,86,0.5)), to(
        rgba(76,49,65,0.7)));
        background: -webkit-linear-gradient(
        rgba(99,64,86,0.5), 
        rgba(76,49,65,0.7));
        background: linear-gradient(
        rgba(99,64,86,0.5), 
        rgba(76,49,65,0.7));
        border-radius: 5px;
        border: 1px solid #4e3043;
        box-shadow: inset 0 1px rgba(255,255,255,0.4), 0 2px 1px rgba(0,0,0,0.1);
        cursor: pointer;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
        color: white;
        text-shadow: 0 1px 0 
        rgba(0,0,0,0.3);
        font-size: 16px;
        font-weight: bold;
        font-family: 'Raleway', 'Lato', Arial, sans-serif;
    }
</style>

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
			<?php echo form_open('change-new-pass', 'id="frm_newpass"'); ?>
		              
		       <?php 
		          echo form_input('old-password', set_value('old-password'), 'id="old-password" autofocus placeholder="Old Password"');
		       ?>
		    <br>
		       <?php 
		          echo form_password('password', '', 'id="password" placeholder="New Password"');
		       ?>
            <br>
               <?php 
                  echo form_password('re-password', '', 'id="re-password" placeholder="Re-enter Password"');
               ?>
		    <br>
		       <?php echo form_submit('submit', 'Update', 'id="btn-change-pass"'); ?>
		    <div class="status"></div>
		    <?php echo form_close(); ?>
            <br>
		    <?php echo validation_errors(); ?>
		</div>
	</div>
</div> 

