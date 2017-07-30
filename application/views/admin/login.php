<div class="container">
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
		<div class="login">
	        
	        
	        <form action="<?php echo base_url().'admin/login';?>" method="POST">
				<div class="form-group">
	                <label for="email">Username</label>
	                <input name="username" id="email" value="" class="form-control" type="text">
	            </div>

	            <div class="form-group">
	                <label for="password">Password</label>
	                <input name="password" id="password" class="form-control" type="password">
	            </div>
	            
	            <div class="form-group clearfix">
	                <div class="checkbox pull-left">
		                <label><input name="remember" value="1" type="checkbox"> Remember me</label>
		            </div>
				<input type="submit" name="submit" value="Login" class="btn btn-primary">
	            </div>
	        </form>
        	<span class="pull-left"><a href="http://crosbyequine.com">← Back home</a></span>
        </div>
    </div>