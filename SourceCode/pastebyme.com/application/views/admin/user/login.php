<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>public_html/images/favicon.ico">
        <title>Admin | <?php echo $title_page; ?></title>
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="<?php echo base_url(); ?>public_html/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public_html/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public_html/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>public_html/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public_html/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			PUBLIC_URL = '<?php echo base_url(); ?>';
			ADMIN_URL = '<?php echo base_url(); ?>admin';     		
		</script>
		<style type="text/css">
		.form-signin {
		    margin: 0 auto;
		    width: 330px;
		    padding: 15px;
		    margin-top: 100px;
		}
		.form-signin .checkbox {
		    margin-bottom: 10px;
		}
		.form-signin input[type="text"] {
		    border-bottom-left-radius: 0;
		    border-bottom-right-radius: 0;
		    margin-bottom: -1px;
		}
		.form-signin .form-control {
		    -moz-box-sizing: border-box;
		    font-size: 16px;
		    height: auto;
		    padding: 10px;
		    position: relative;
		}
		
		</style>
    </head>
    <body>
    	<div class="container">    		
    		<?php echo form_open('', 'class="form-signin" id="frm_login"'); ?>			
				<h2 class="form-signin-heading"></h2>
				<?php echo form_input('email', set_value('email'), 'autofocus="" placeholder="Email" class="form-control"'); ?>
				<?php echo form_password('password', set_value('password'), 'placeholder="Password" class="form-control"'); ?>
				<!--
				<label class="checkbox">
				<input type="checkbox" value="remember-me"> Remember me
				</label>
				-->
				<?php echo form_submit('submit', 'Log in', 'class="btn btn-lg btn-block btn-primary"'); ?>
				<div class="status">
					<div class="error">
					<?php echo $this->session->flashdata('error'); ?>
					</div>
					<?php echo validation_errors('<div class="error">', '</div>'); ?>

				</div>
			<?php echo form_close();?>
		</div>
		<!---
    	<div class="modal show" role="dialog">				
			<div class="modal-header">
				<h3>Log in</h3>
				<p>Please log in using your credentials</p>
			</div>
			<div class="modal-body">
				
				
				<table class="table">
					<tr>
						<td>Email</td>
						<td>td>
					</tr>
					<tr>
						<td>Password</td>
						<td><?php echo form_password('password'); ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo form_submit('submit', 'Log in', 'class="btn btn-primary"'); ?></td>
					</tr>
				</table>
				<?php echo form_close();?>
			</div>

			<div class="modal-footer">
				&copy; <?php echo date('Y'); ?> Pastebyme.com
			</div>
		</div>
		-->
	</body>
</html>

		