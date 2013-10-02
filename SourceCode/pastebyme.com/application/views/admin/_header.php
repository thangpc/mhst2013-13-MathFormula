<nav class="navbar navbar-default" role="navigation">
  	<!-- Brand and toggle get grouped for better mobile display -->
  	<div class="navbar-header">
    	<a class="navbar-brand" href="<?php echo site_url('admin'); ?>">Administrator System</a>
  	</div>

  	<!-- Collect the nav links, forms, and other content for toggling -->
  	<div class="collapse navbar-collapse navbar-ex1-collapse">
    	<ul class="nav navbar-nav">
    		<li><a href="#"></a></li>
      		<li>
      			<a href="<?php echo site_url('admin/user/all') ?>" class="dropdown-toggles" data-toggle="dropdowns">User</a>
      			<ul class="dropdown-menu">
          			<li><a href="<?php echo site_url().'admin/user/all' ?>">List</a></li>
          			<li><a href="<?php echo site_url().'admin/user/permission' ?>">Permission</a></li>
        		</ul>
      		</li>
      		<li>
      			<a href="<?php echo site_url().'admin/formula' ?>">Formula</a>
      		</li>
    	</ul>

    	<ul class="nav navbar-nav navbar-right">      
      		<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('admin'); ?> <b class="caret"></b></a>
        		<ul class="dropdown-menu">
          			<!--<li><a href="#">Change Password</a></li>-->
          			<li><a href="<?php echo site_url('admin/logout'); ?>">Logout</a></li>
        		</ul>
      		</li>
    	</ul>
  	</div><!-- /.navbar-collapse -->
</nav>
