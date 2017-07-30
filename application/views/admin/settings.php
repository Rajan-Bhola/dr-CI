<script>
jQuery(document).ready(function() {
$("form").submit(function(e){
        e.preventDefault();
    });
});
</script>
<div class="container">
    	<div class="main">
		<div class="alert alert-success" style="display:none;">
			  <strong>Success! </strong>Record Updated Succesfully.
		</div>
		<div  class="col-sm-6">
        <h3>Left Tabs</h3>
        <hr/>
        <div class="col-xs-3">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left">
                <li class="active"><a href="#home" data-toggle="tab">Account</a></li>
                <li><a href="#profile" data-toggle="tab">Profile</a></li>
                <li><a href="#password" data-toggle="tab">Password</a></li>
                <li><a href="#messages" data-toggle="tab">Messages</a></li>
                <li><a href="#settings" data-toggle="tab">Connect</a></li>
            </ul>
        </div>
        <div class="col-xs-9">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home">
					<h3 class="page-header">Account</h3>
					<form  method="POST" id="account_form">
							<div class="form-group">
							<label for="username">Username <em>(required)</em></label>
							<input name="username" id="username" value="<?php echo $users->username; ?>" class="form-control" type="text">
						</div>
					
					<div class="form-group">
						<label for="email">E-mail <em>(required)</em></label>
						<input name="email" id="email" value="<?php echo $users->email; ?>" class="form-control" type="text">
					</div>

					<div class="form-group">
						<label for="locale">Language</label>
						<select name="locale" id="locale" class="form-control">
															<option value="en">English</option>
										</select>
					</div>
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $users->id; ?>"/>
					<div class="form-group">
						<button type="submit" id="account" name="account" class="btn btn-primary">Save Changes</button>
											<div class="pull-right v-middle"><a href="?p=delete">I'd like to delete my account</a></div>
									</div>
					</form>
				</div>
                <div class="tab-pane" id="profile">
						<link href="http://crosbyequine.com/assets/css/vendor/imgpicker.css" rel="stylesheet">
						
						<h3 class="page-header">Profile</h3>

						<form id="profile_form" method="POST" ">
							<div class="avatar-container form-group">
								<label>Avatar</label>

								<div class="clearfix">
									<div class="pull-left">
										<a href="http://crosbyequine.com/assets/img/avatar.png" target="_blank"><img src="http://crosbyequine.com/assets/img/avatar.png" class="avatar-image img-thumbnail"></a>
									</div>
									<div class="pull-left" style="margin-left: 10px;">
																<select name="avatar_type" class="form-control">
											<option value="" selected="">Default</option>
											<option value="image">Uploaded</option>
											<option value="gravatar">Gravatar</option>

																	</select>
										<div class="btn btn-info btn-sm ip-upload">Upload <input name="file" class="ip-file" type="file"></div>
										<button type="button" class="btn btn-info btn-sm ip-webcam">Webcam</button>
									</div>
								</div>

								<div class="alert ip-alert"></div>
								<div class="ip-info">To crop this image, drag a region below and then click "Save Image".</div>
								<div class="ip-preview"></div>
								<div class="ip-rotate">
									<button type="button" class="btn btn-default ip-rotate-ccw" title="Rotate counter-clockwise"><span class="icon-ccw"></span></button>
									<button type="button" class="btn btn-default ip-rotate-cw" title="Rotate clockwise"><span class="icon-cw"></span></button>
								</div>
								<div class="ip-progress">
									<div class="text">Uploading...</div>
									<div class="progress progress-striped active"><div class="progress-bar"></div></div>
								</div>
								<div class="ip-actions">
									<button type="button" class="btn btn-sm btn-success ip-save">Save Image</button>
									<button type="button" class="btn btn-sm btn-primary ip-capture">Capture</button>
									<button type="button" class="btn btn-sm btn-default ip-cancel">Cancel</button>
								</div>
							</div>

											<div class="form-group">
									<label for="display_name">Display name</label>
									<select name="display_name" id="display_name" class="form-control">
																	<option selected=""><?php echo $users->username; ?></option>
										
																
																
															</select>
								</div>
								
							<div class="form-group"><label for="usermeta-first_name">First name</label><input class="form-control" name="firstname" id="firstname" value="<?php echo $users->firstname; ?>" type="text"></div>
							<div class="form-group"><label for="usermeta-last_name">Last name</label><input class="form-control" name="lastname" id="lastname" value="<?php echo $users->lastname; ?>" type="text"></div>
							<div class="form-group"><label for="usermeta-gender">Gender</label><select class="form-control" name="gender" id="gender"><option value="X">Unspecified</option><option value="F"<?php if($users->gender == 'F') { echo 'selected'; } ?>>Female</option><option value="M" <?php if($users->gender == 'M') { echo 'selected'; } ?>>Male</option></select></div>
							<div class="form-group"><label for="usermeta-birthday">Birthday</label><input class="form-control" name="birthday" id="birthday" value="<?php echo $users->birthday; ?>" type="text"></div>
							<div class="form-group"><label for="usermeta-url">Website</label><input class="form-control" name="website" id="website" value="<?php echo $users->website; ?>" type="text"></div>
							<div class="form-group"><label for="usermeta-phone">Phone</label><input class="form-control" name="phone" id="phone" value="<?php echo $users->phone; ?>" type="text"></div>
							<div class="form-group"><label for="usermeta-location">Location</label><input class="form-control" name="location" id="location" value="<?php echo $users->location; ?>" type="text"></div>
							<div class="form-group"><label for="usermeta-about">About me</label><textarea class="form-control" name="about" id="about"><?php echo $users->about; ?></textarea></div>

							<div class="form-group">
								<button type="submit" id="profile" name="submit" class="btn btn-primary">Save Changes</button>
							</div>
						</form>

						
				</div>
                <div class="tab-pane" id="password">
					<h3 class="page-header">Password</h3>
					<form id="pwd_form" method="POST" >
						<div class="form-group">
							<label for="pass1">Current password</label>
							<input name="oldpassword" id="oldpassword" class="form-control showpassword" autocomplete="off" value="<?php echo $users->password; ?>" type="password">
							<input type="checkbox" id="show-password"> <label for="show-password">Show password</label>
						</div>
						<div class="form-group">
							<label for="pass2">New password</label>
							<input name="newpassword" id="newpassword" class="form-control" autocomplete="off" value="" type="password">
						</div>
						<div class="form-group">
							<label for="pass3">Verify password</label>
							<input name="confirmpassword" id="confirmpassword" class="form-control" autocomplete="off" value="" type="password">
						</div>
						<div class="form-group">
							<button type="submit" name="submit" id="pwd" class="btn btn-primary">Save Changes</button>
						</div>
					</form>
				</div>
                <div class="tab-pane" id="messages">
						<h3 class="page-header">Private Messages</h3>
						
						<h4>Settings</h4>
						<form action="settingsMessages" class="ajax-form">
							<div class="checkbox">
								<label>
									<input value="1" name="email_messages" type="checkbox">Email me when I receive a new message.				</label>
							</div>
							<div class="checkbox">
								<label>
									<input value="1" name="email_comments" type="checkbox">Email me when someone replies to my comments.				</label>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
							</div>
						</form>
						<br>
						<h4>Contacts</h4>
						<ul class="list-group contact-list">
									</ul>

				</div>
                <div class="tab-pane" id="settings">
				<p>
					<span class="label label-warning">Warning</span>
					If you disconnect all of your social accounts make sure you have set a <a href="?p=password">Password</a> so you can use it to login. Or you can request a password reminder later.		</p>
				</div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<div class="row">

</div>

		</div>
	</div>