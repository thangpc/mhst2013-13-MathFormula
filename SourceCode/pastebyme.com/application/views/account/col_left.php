<table class="user-info" cellspacing="0">
		    <tbody>
		    	<tr class="odd-row">
		    		<th>
		    			<img src="<?php echo base_url().'public_html/images/avatars/geek_girl.png'; ?>" alt="">
		    			<br>
		    			<a href='<?php echo site_url("account/$user"); ?>'><?php echo $user; ?></a>
		    		</th>
		    	</tr>
		    	<?php
		    	if ( ($this->user_model->loggedin('user') == 'public') && ($user == $this->session->userdata('user')) ) {
		    	?>
		    	<tr>
		    		<td><a href="<?php echo site_url('account/change-info'); ?>">change info</a></td>
		    	</tr>
		    	<tr>
		    		<td><a href="<?php echo site_url('account/change-pass'); ?>">change password</a></td>
		    	</tr>
		    	<?php } else { ?>		    		
			    	<tr>
			    		<td><a href="#">Joined: <?php echo $joined; ?></a></td>
			    	</tr>
		    	<?php } ?>
			</tbody>
		</table>