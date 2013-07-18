<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | <?php echo $title_page; ?></title>
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="<?php echo base_url(); ?>public/admin/css/style.css" />
		<script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/ddaccordion.js"></script>
		<script type="text/javascript">
			PUBLIC_URL = '<?php echo base_url(); ?>';
			ADMIN_URL = '<?php echo base_url(); ?>admin';
		</script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/admin/js/check.js"></script>
    </head>
    <body>
		<?php
		$this->load->view('admin/header');
		$this->load->view('admin/'.$content_view);
		$this->load->view('admin/footer');
		?>
	</body>
</html>