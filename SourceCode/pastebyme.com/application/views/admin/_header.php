<nav class="navbar navbar-default" role="navigation">
  	<!-- Brand and toggle get grouped for better mobile display -->
  	<div class="navbar-header">
    	<a class="navbar-brand" href="<?php echo site_url('admin'); ?>">Administrator Panel</a>
  	</div>

  	<!-- Collect the nav links, forms, and other content for toggling -->
  	<div class="collapse navbar-collapse navbar-ex1-collapse">
    	<ul class="nav navbar-nav">
    		<li><a href="#"></a></li>
      		<li class="active">
      			<a href="#" class="dropdown-toggle" data-toggle="dropdown">User</a>
      			<ul class="dropdown-menu">
          			<li><a href="#">List</a></li>
          			<li><a href="#">Add user</a></li>          			
          			<li><a href="#">Block user</a></li>
        		</ul>
      		</li>
      		<li>
      			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Formular</a>
      			<ul class="dropdown-menu">
          			<li><a href="#">List</a></li>
          			<li><a href="#">Add user</a></li>          			
          			<li><a href="#">Block user</a></li>
        		</ul>
      		</li>
      		<li>
      			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Math</a>
      		</li>
      		<li><a href="#"></a></li>
    	</ul>

    	<form class="navbar-form navbar-left" role="search">
      		<div class="form-group">
        		<input type="text" class="form-control" placeholder="Search">
      		</div>
      		<button type="submit" class="btn btn-default">Submit</button>
    	</form>

    	<ul class="nav navbar-nav navbar-right">      
      		<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('admin'); ?> <b class="caret"></b></a>
        		<ul class="dropdown-menu">
          			<li><a href="#">Change Password</a></li>
          			<li><a href="<?php echo site_url('admin/logout'); ?>">Logout</a></li>
        		</ul>
      		</li>
    	</ul>
  	</div><!-- /.navbar-collapse -->
</nav>
