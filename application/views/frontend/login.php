<div class="container">

    	<div class="main">
		<?php if( $feedback = $this->session->flashdata('login_failed')): 
	?>
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="alert alert-dismissible alert-danger">
          <?= $feedback ?>
        </div>
      </div>
    </div>
<?php endif; ?>
<div class="row">
	<div class="col-md-6">
		<h3 class="page-header">Log in</h3>
		
		<form action="<?php echo base_url().'frontend/login_validate'; ?>" method="POST">
			<div class="form-group">
                <label for="username">E-mail or Username</label>
                <input name="username"  class="form-control" type="text">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password"  class="form-control" type="password">
            </div>
            
            <div class="form-group">
                <div class="checkbox">
	                <label><input name="remember" value="1" type="checkbox"> Remember me</label>
	            </div>
            </div>

	        <div class="form-group pull-left">
				<button type="submit" name="submit" class="btn btn-primary">Log in</button>
			</div>

			<div class="form-group pull-right">
				<a href="reminder.php">Forgot password?</a> <br>
				<a href="activation.php">Resend activation E-mail</a>
			</div>

			<div class="clearfix"></div>
			
					</form>
    		</div>
</div>

		</div>
	</div>