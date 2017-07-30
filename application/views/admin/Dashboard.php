<div class="container">
<?php if( $feedback = $this->session->flashdata('feedback')): 
		$feedback_class = $this->session->flashdata('feedback_class');
	?>
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="alert alert-dismissible <?= $feedback_class ?>">
          <?= $feedback ?>
        </div>
      </div>
    </div>
<?php endif; ?>
     <!-- Compose email Modal -->
	<div class="modal fade" id="composeModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<form action="sendEmail" class="ajax-form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Compose E-mail</h4>
					</div>
					<div class="modal-body">
		          		<div class="alert"></div>
						
						<div class="form-group">
			                <input name="to" placeholder="To" class="form-control" type="text">
			            </div>

			            <div class="form-group">
			                <input name="subject" placeholder="Subject" class="form-control" type="text">
			            </div>

			            <div class="form-group">
			                <textarea class="form-control" name="message" placeholder="Message" rows="5"></textarea>
			            </div>

			            <div class="help-block">You can add multiple emails separated with a semicolon (;)</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<h3 class="page-header">Dashboard</h3>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">User Stats</h3>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item">
				    	<span class="badge badge-primary"><?php echo $status['total']; ?></span>
				    	Total				  	</li>
					<li class="list-group-item">
				    	<span class="badge badge-success"><?php echo $status['activated']; ?></span>
				    	Activated				  	</li>
				  	<li class="list-group-item">
				    	<span class="badge badge-warning"><?php echo $status['unactivated']; ?></span>
				    	Unactivated				  	</li>
				  	<li class="list-group-item">
				    	<span class="badge badge-danger"><?php echo $status['suspended']; ?></span>
				    	Suspended				  	</li>
				</ul>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Latest Users</h3>
			</div>
			<div class="panel-body">
				<ul class="list-group">
									<?php		foreach ($latest as $new) { ?>					<li class="list-group-item">
							<a href="<?php echo base_url('users/edituser/')."$new->id"; ?>" class="pull-right">Edit</a>
							<a href="<?php echo base_url('users/index/')."$new->id"; ?>" target="_blank"><?php echo $new->username; ?></a>
							<span class="help-block"><?php echo $new->created_at; ?></span>
						</li>
									<?php } ?>
									</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
				
				
	</div>
</div>

<style>
	.panel-body { padding: 5px 15px; }
	.list-group { margin-bottom: 0px; }
	.list-group-item {
		word-break: break-all;
		border: none;
		border-bottom: 1px solid #ddd;
		padding: 10px 0px;
		margin-bottom: 0px;
	}
	.list-group>li:last-child { border-bottom: none; }
	.list-group-item .help-block { margin: 0px; font-size: 13px; }
	.panel .badge { font-weight: normal; }

	.badge.facebook {background: #3b5998;}
	.badge.google {background: #d34836;}
	.badge.twitter {background: #00aced;}
	.badge.linkedin {background: #007bb6;}
	.badge.microsoft {background: #007734;}
	.badge.instagram {background: #517fa4;}
	.badge.github {background: #333;}
	.badge.yammer {background: #396B9A;}
	.badge.foursquare {background: #0072b1;}
	.badge.vkontakte {background: #45668e;}
	.badge.soundcloud{background: #F76700;}
</style>

	</div>