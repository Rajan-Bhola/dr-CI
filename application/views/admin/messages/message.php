	<script type="text/javascript">	  
		$( document ).ready ( function () {
			
			$('#nickname').keyup(function() {
				var nickname = $(this).val();
				
				if(nickname == ''){
					$('#msg_block').hide();
				}else{
					$('#msg_block').show();
				}
			});
			
			// initial nickname check
			$('#nickname').trigger('keyup');
		});
		
		
	</script>
<div class="container">
<h3 class="page-header">Messages with Admin</h3>
<p><a href="?page=messages">← Back to Messages</a></p>

<div class="row">
	<div class="col-md-6">
		<div class="conversation">
			<ul class="pm-list">
	<?php		foreach($recieve as $user) { ?>
					<li class="pm received" data-message-id="3">
						<img src="http://crosbyequine.com/assets/img/avatar.png" class="pm-avatar">
						<div class="pm-content clearfix">
							<time class="pm-time timeago" datetime="<?php echo date("Y-m-d\TH:i:s.Z\Z", $user->created_at); ?>" title="<?php echo date("Y-m-d\TH:i:s.Z\Z", $user->created_at); ?>"></time>
							<div class="pm-message">
								<div class="pm-text"><?php echo $user->message; ?></div>
								<div class="pm-caret">
						    		<div class="pm-caret-outer"></div>
						        	<div class="pm-caret-inner"></div>
						      	</div>
							</div>
							<span class="pm-delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="admin.delete_message">
								<span class="glyphicon glyphicon-trash"></span>
							</span>
						</div>
					</li>
<?php	}
foreach($users  as $r) { ?>
					<li class="pm sent " data-message-id="4">
						<img src="http://crosbyequine.com/assets/img/avatar.png" class="pm-avatar">
						<div class="pm-content clearfix">
							<time class="pm-time timeago" datetime="<?php echo date("Y-m-d\TH:i:s.Z\Z", $r->created_at); ?>" title="<?php echo date("Y-m-d\TH:i:s.Z\Z", $r->created_at); ?>"></time>
							<div class="pm-message">
								<div class="pm-text"><?php echo $r->message; ?></div>
								<div class="pm-caret">
						    		<div class="pm-caret-outer"></div>
						        	<div class="pm-caret-inner"></div>
						      	</div>
							</div>
							<span class="pm-delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="admin.delete_message">
								<span class="glyphicon glyphicon-trash"></span>
							</span>
						</div>
					</li>
<?php } ?>
							</ul>
		</div>
		<br>
				
		<form action="<?php echo base_url('admin/addmessage'); ?>" method="POST">
		<input name="username"  id="search" value="<?php echo $users[0]->username; ?>" type="hidden">
		<input name="from_id" id="from_id" value="<?php echo $users[0]->user_id; ?>" type="hidden">
		 <input name="user_id" id="user_id" value="<?php echo $users[0]->from_id; ?>" type="hidden">
		        <input name="status"  value="1" type="hidden">
				<input type="hidden" name="group" value="user">

			<div class="form-group">
		        <textarea name="message" id="message" class="form-control" rows="4"></textarea>
		    </div>

            <div class="form-group">
				<button type="submit" id="submit" name="submit" class="btn btn-primary">Send message</button>
			</div>
		</form>
	</div>
</div>

<script src="http://timeago.yarp.com/jquery.timeago.js"></script>
<script>
jQuery(document).ready(function() {
  jQuery("time.timeago").timeago();
});

</script>

	</div>