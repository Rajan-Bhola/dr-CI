<div class="container">
    	<div class="main">
	<h3 class="page-header">
		<?php echo $users->username; ?> <small>(<?php echo $users->firstname; ?>)</small>
			</h3>
	
	<div class="row">
		<div class="col-md-3">
			<img src="http://crosbyequine.com/assets/img/avatar.png" class="img-thumbnail" style="margin-bottom: 10px;">
		</div>
		<div class="col-md-8">
			<p><span class="glyphicon glyphicon-envelope"></span><?php echo $users->email; ?></p>

						
			<!-- 
									 -->

			
			
							<p><span class="glyphicon glyphicon-time"></span><?php echo $users->birthday; ?></p>
			
			<p class="social-icons">
							</p>

					</div>
	</div>
	
	

<style>
	.col-md-8 {padding-left: 10px;}
	.col-md-8 .glyphicon {opacity: .7; padding-right: 5px;}
</style>

		</div>
	</div>	