<div class="container">
<h3 class="page-header">Messages with Admin</h3>
<p><a href="?page=messages">← Back to Messages</a></p>

<div class="row">
	<div class="col-md-6">
		<div class="conversation">
			<ul class="pm-list">
					<li class="pm sent" data-message-id="3">
						<img src="http://crosbyequine.com/assets/img/avatar.png" class="pm-avatar">
						<div class="pm-content clearfix">
							<time class="pm-time timeago" datetime="<?php echo date("Y-m-d\TH:i:s.Z\Z", $datas->created_at); ?>" title="<?php echo date("Y-m-d\TH:i:s.Z\Z", $datas->created_at); ?>"></time>
							<div class="pm-message">
								<div class="pm-text"><?php echo $datas->message; ?></div>
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
	
							</ul>
		</div>
		<br>
				
		<form action="" method="POST">
			<input name="_token" value="6a21dc29d1594a26ef196cd52b2f38f5" type="hidden">
			<div class="form-group">
		        <textarea name="message" class="form-control" rows="4"></textarea>
		    </div>

            <div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary">Send message</button>
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