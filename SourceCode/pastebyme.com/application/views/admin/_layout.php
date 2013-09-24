<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>public_html/images/favicon.ico">
        <title>Admin | <?php echo $title_page; ?></title>
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="<?php echo base_url(); ?>public_html/css/admin.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public_html/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public_html/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>public_html/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public_html/js/bootstrap.min.js"></script>		
		<script type="text/javascript">
			PUBLIC_URL = '<?php echo base_url(); ?>';
			ADMIN_URL = '<?php echo base_url(); ?>admin/';     		
		</script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public_html/js/admin.js"></script>
    </head>
    <body>
	<?php
		$this->load->view('admin/_header');
		$this->load->view('admin/'.$content_view);
		$this->load->view('admin/_footer');
	?>
	</body>
</html>