<div class="container">
    	<div class="main">
<div class="row">
	<div class="col-md-6">
					<h3 class="page-header">Sign up</h3>

			<form action="<?php echo base_url('frontend/adduser'); ?>" method="POST">
									<div class="form-group">
				        <label for="signup-username">Username</label>
						<?php echo form_error('username'); ?>
				        <input name="username"  class="form-control" type="text">
				    </div>
				
			    <div class="form-group">
			        <label for="signup-email">E-mail</label>
					<?php echo form_error('email'); ?>
			        <input name="email"  class="form-control" type="text">
			    </div>

			    <div class="form-group">
			        <label for="signup-pass1">Password</label>
					<?php echo form_error('password'); ?>
			        <input name="password"  class="form-control" autocomplete="off" value="" type="password">
			    </div>
			    <!--
			    <div class="form-group">
			        <label for="signup-pass2">Verify password</label>
			        <input type="password" name="pass2" id="signup-pass2" class="form-control" autocomplete="off">
			    </div>
			    -->

			    
				
				<div class="form-group">
					<input type="submit" name="submit" value="Sign up" class="btn btn-primary"/>
				</div>

							</form>
    		</div>
</div>

		</div>
	</div>