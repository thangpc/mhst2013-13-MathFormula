<div class="container">
	<ol class="breadcrumb">
	  <li><a href="<?php echo site_url('admin') ?>">Dashboard</a></li>
	  <li><a href="<?php echo site_url('admin/user/all') ?>">Users</a></li>
	  <li class="active"><?php echo $title_page; ?></li>
	</ol>
	<div class="panel panel-default">
  		<div class="panel-heading">User management</div>
		<div class="search">
			<form class="frm_permission navbar-form navbar-center" action="<?php echo site_url("admin/user/all") ?>" role="search" method="GET">
		    	<div class="form-group">
		        	<input type="text" name="keyword" id="username" class="form-control" value="<?php echo $keyword; ?>" style="width:300px" placeholder="Enter user to apply permission">
		      	</div>
		      	<div style="margin-top: 10px;">
		      		<button class="btn btn-default" type="submit">Search</button>
		      	</div>
		    </form>
	    </div>
		<?php
		if (count($users) != 0) { ?>
		<table class="table table-striped">
			<tr>
				<th width="200">Date</th>
				<th>User</th>			
				<th width="120">Role</th>
				<th width="120">Status</th>
				<th width="250">Action</th>
			</tr>
			<?php
			foreach ($users as $key => $val) {
				$user = $val['username'];
				$id = $val['u_id'];
				if ($user == $admin) continue;
			?>
			<tr class="row-<?php echo $id; ?>">
				<td><?php echo $val['time_created']; ?></td>
				<td><a target="_blank" href="<?php echo site_url("account/$user"); ?>"><?php echo $val['username']; ?></a></td>						
				<td class="user-role"><?php echo $val['role']; ?></td>
				<td class="user-block"><?php
					if ($val['is_active'] == 0) echo 'blocked';
					else echo 'actived';
					?>
				</td>
				<td>
					<a href="#" id="<?php echo $id; ?>" class="btn-set-admin">
						<?php
						if ($val['role'] == 'user') echo 'Set Admin';
						else echo 'Set User';
						?>
					</a> | 
					<a href="#" id="<?php echo $id; ?>" class="btn-block-user">
						<?php
						if ($val['is_active'] == '0') echo 'Un-Block';
						else echo 'Block';
						?>
					</a> | 
					<a href="#" id="<?php echo $id; ?>" class="btn-delete-user">Delete</a>
				</td>
			</tr>

			<?php
			}
			?>
		</table>	
		<div class="text-center">
			<?php echo $pages; ?>
		</div>
		<div class="clearfix"></div>
		<?php
		} else { ?>
			<div class="text-center" style="color: red; margin-top: 10px;">No records</div>
		<?php
		}
		?>
	</div>
</div>