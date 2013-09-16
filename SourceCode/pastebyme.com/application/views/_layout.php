<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title_page; ?></title>
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="<?php echo base_url(); ?>public_html/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public_html/css/mathquill.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>public_html/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public_html/js/mathquill.js"></script>
		<script type="text/javascript">
			PUBLIC_URL = '<?php echo base_url(); ?>';
			ADMIN_URL = '<?php echo base_url(); ?>admin';     		
		</script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public_html/js/base.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public_html/js/math.js"></script>
    </head>
    <body>
	<?php
		$this->load->view('_header');
		$this->load->view($content_view);
		$this->load->view('_footer');
	?>
	</body>
</html>