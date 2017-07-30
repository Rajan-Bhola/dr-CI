<div class="container">
 <div class="col-lg-6">
</div>
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
<h3 class="page-header">Edit User</h3>
<div class="row">
	<div class="col-md-6">

		
		<form action="<?php echo base_url('users/updateuser/')."$users->id"; ?>" method="POST">
				<div class="form-group">
			        <label for="username">Username <em>(required)</em></label>
					<?php echo form_error('username'); ?>
			        <input name="username" id="username" value="<?php echo $users->username; ?>" class="form-control" type="text">
			    </div>
			
		    <div class="form-group">
		        <label for="email">E-mail <em>(required)</em></label>
				<?php echo form_error('email'); ?>
		        <input name="email" id="email" value="<?php echo $users->email; ?>" class="form-control" type="text">
		    </div>

		    <div class="form-group">
		        <label for="pass1">Password <em>(required)</em></label>
				<?php echo form_error('password'); ?>
		        <input name="password" id="pass1" class="form-control" autocomplete="off" value="<?php echo $users->password; ?>" type="password">
		    </div>

		    <div class="form-group">
		        <label for="pass2">Verify Password <em>(required)</em></label>
								<?php echo form_error('pass2'); ?>
		        <input name="pass2" id="pass2" value="<?php echo $users->password; ?>" class="form-control" autocomplete="off" type="password">
		    </div>

		    <div class="form-group">
		    	<div class="checkbox">
                	<label><input name="send_pass" value="<?php echo $users->send_pass; ?>" checked="" type="checkbox"> Send this password to the new user by E-mail.</label>
                </div>
            </div>

            <div class="form-group">
            	<label for="role">Role</label>
            <select name="role" id="role" class="form-control">
            		<option value=""> </option>
				<?php foreach($roles as $role) { ?>
					<option value="<?php echo $role->name; ?>" <?php if($role->name == $users->role) { echo 'selected'; } ?>><?php echo $role->name; ?></option>
				<?php } ?></select>
            </div>

             <div class="form-group">
            	<label for="status">Account Status</label>
            	<select name="status" id="status" class="form-control">
            		<option value="activated" <?php if($users->status == 'activated'){ echo 
					'selected'; } ?>>activated</option>
            		<option value="unactivated" <?php if($users->status == 'unactivated'){ echo 
					'selected'; } ?>>unactivated</option>
					<option value="suspended" <?php if($users->status == 'suspended'){ echo 
					'selected'; } ?>>suspended</option>
				</select>
            </div>

            <div class="form-group"><label for="usermeta-first_name">First name</label>
			<?php echo form_error('firstname'); ?>
							<input class="form-control" name="firstname" id="usermeta-first_name" value="<?php echo $users->firstname; ?>" type="text"></div>
<div class="form-group"><label for="usermeta-last_name">Last name</label><input class="form-control" name="lastname" id="usermeta-last_name" value="<?php echo $users->lastname; ?>" type="text"></div>
<div class="form-group"><label for="usermeta-gender">Gender</label><select class="form-control" name="gender" id="usermeta-gender"><option value="X"  <?php if($users->gender == 'X'){ echo 'selected'; } ?>>Unspecified</option><option value="F" <?php if($users->gender == 'F'){ echo 'selected'; } ?>>Female</option><option value="M" <?php if($users->gender == 'M'){ echo 'selected'; } ?>>Male</option></select></div>
<div class="form-group"><label for="usermeta-birthday">Birthday</label><input class="form-control" name="birthday" id="usermeta-birthday" value="<?php echo $users->birthday; ?>" type="text"></div>
<div class="form-group"><label for="usermeta-url">Website</label><input class="form-control" name="website" id="usermeta-url" value="<?php echo $users->website; ?>" type="text"></div>
<div class="form-group"><label for="usermeta-phone">Phone</label><?php echo form_error('phone'); ?><input class="form-control" name="phone" id="usermeta-phone" value="<?php echo $users->phone; ?>" type="text"></div>
<div class="form-group"><label for="usermeta-location">Location</label><input class="form-control" name="location" id="usermeta-location" value="<?php echo $users->location; ?>" type="text"></div>
<div class="form-group"><label for="usermeta-about">About me</label><textarea class="form-control" name="about" id="usermeta-about"><?php echo $users->about; ?></textarea></div>
<div class="checkbox"><label for="usermeta-verified"><input value="1" name="verified" id="usermeta-verified" type="checkbox" <?php if($users->verified == 1){ echo 'checked';} ?>>Verified Account</label></div>

            <br>
            <div class="form-group">
				<input type="submit" name="submit" value="Update User" class="btn btn-primary">
			</div>
		</form>
	</div>
</div>

	</div>