<div class="container">
 <div class="col-lg-6">
</div>
  
<h3 class="page-header">Add New User</h3>
<div class="row">
	<div class="col-md-6">

		
		<form enctype="multipart/form-data" action="<?php echo base_url('users/adduser'); ?>" method="POST">
				<div class="form-group">
			        <label for="username">Username <em>(required)</em></label>
					<?php echo form_error('username'); ?>
			        <input name="username" id="username" value="" class="form-control" type="text">
			    </div>
			
		    <div class="form-group">
		        <label for="email">E-mail <em>(required)</em></label>
				<?php echo form_error('email'); ?>
		        <input name="email" id="email" value="" class="form-control" type="text">
		    </div>

		    <div class="form-group">
		        <label for="pass1">Password <em>(required)</em></label>
				<?php echo form_error('password'); ?>
		        <input name="password" id="pass1" class="form-control" autocomplete="off" value="" type="password">
		    </div>

		    <div class="form-group">
		        <label for="pass2">Verify Password <em>(required)</em></label>
								<?php echo form_error('pass2'); ?>
		        <input name="pass2" id="pass2" class="form-control" autocomplete="off" type="password">
		    </div>

		    <div class="form-group">
		    	<div class="checkbox">
                	<label><input name="send_pass" value="1" checked="" type="checkbox"> Send this password to the new user by E-mail.</label>
                </div>
            </div>

            <div class="form-group">
            	<label for="role">Role</label>
            	<select name="role" id="role" class="form-control">
            		<option value=""> </option>
				<?php foreach($roles as $role) { ?>
					<option value="<?php echo $role->name; ?>"><?php echo $role->name; ?></option>
				<?php } ?></select>
            </div>

             <div class="form-group">
            	<label for="status">Account Status</label>
            	<select name="status" id="status" class="form-control">
            		<option value="activated">activated</option>
            		<option value="unactivated">unactivated</option>
					<option value="suspended">suspended</option>
				</select>
            </div>

            <div class="form-group"><label for="usermeta-first_name">First name</label>
			<?php echo form_error('firstname'); ?>
							<input class="form-control" name="firstname" id="usermeta-first_name" value="" type="text"></div>
<div class="form-group"><label for="usermeta-last_name">Last name</label><input class="form-control" name="lastname" id="usermeta-last_name" value="" type="text"></div>
<div class="form-group"><label for="usermeta-gender">Gender</label><select class="form-control" name="gender" id="usermeta-gender"><option value="X">Unspecified</option><option value="F">Female</option><option value="M">Male</option></select></div>
<div class="form-group"><label for="usermeta-birthday">Birthday</label><input class="form-control" name="birthday" id="usermeta-birthday" value="" type="text"></div>
<div class="form-group"><label for="usermeta-url">Website</label><input class="form-control" name="website" id="usermeta-url" value="" type="text"></div>
<div class="form-group"><label for="usermeta-phone">Phone</label><input class="form-control" name="phone" id="usermeta-phone" value="" type="text"></div>
<div class="form-group"><label for="usermeta-location">Location</label><input class="form-control" name="location" id="usermeta-location" value="" type="text"></div>
<div class="form-group"><label for="usermeta-about">About me</label><textarea class="form-control" name="about" id="usermeta-about"></textarea></div>
<div class="checkbox"><label for="usermeta-verified"><input value="1" name="verified" id="usermeta-verified" type="checkbox">Verified Account</label></div>
            <br>
            <div class="form-group">
				<input type="submit" name="submit" value="Add New User" class="btn btn-primary">
			</div>
		</form>
	</div>
</div>

	</div>