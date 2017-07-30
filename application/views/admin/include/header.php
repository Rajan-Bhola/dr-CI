<?php /* echo time()."<br>";
echo date("Y-m-d h:i:sa",1499258412);
die; */
//print_r($this->session->userdata('permissions'));
$perm = $this->session->userdata('permissions');
$perm = $perm->permissions;
$perm = explode(',',$perm);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--meta name="csrf-token" content="<?php //echo csrf_token() ?>"-->
	<link href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-custom.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/colors/dark.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />
	<!--link href="<?php //echo base_url(); ?>assets/css/flat.css" rel="stylesheet" type="text/css" /-->
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.11.1.min.js" type="text/javascript"></script>	
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>	
    <script src="<?php echo base_url(); ?>assets/js/easylogin.js" type="text/javascript"></script>	
    <script src="<?php echo base_url(); ?>assets/js/admin.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/typeahead.min.js" type="text/javascript"></script>
	   <script src="<?php echo base_url(); ?>assets/js/custom2.js" type="text/javascript"></script>
	 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js
" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>
<body>
<input type="hidden" id="base_url" value="<?php echo base_url();  ?>"/>
<div class="navbar navbar-fixed-top navbar-top">
    	<div class="container">
        	<div class="navbar-header">
         		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            		<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          		<a href="<?php echo base_url(); ?>" class="navbar-brand">EL<sup>PRO</sup></a>
        	</div>
			<?php 	if(in_array("*", $perm))
			{ ?>
			<div class="navbar-collapse collapse">
	          	<ul class="nav navbar-nav">	
				
			
	            	<li class="">
	            		<a href="<?php echo base_url(); ?>admin/dashboard"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
  </li> 				
	            			            	<li class="dropdown">
							<a href="<?php echo base_url(); ?>admin/users" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
								<span class="glyphicon glyphicon-user"></span> Users <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
					

																	<li><a href="<?php echo base_url(); ?>admin/users">All Users</a></li>
									
																		
																	<li><a href="<?php echo base_url(); ?>admin/addnewuser">Add New</a></li>
								
								
																	<li><a href="<?php echo base_url(); ?>admin/roles">Roles</a></li>
								
								
															</ul>
						</li>
					
											<li class="">
		            		<a href="<?php echo base_url(); ?>admin/comments">
		            			<span class="glyphicon glyphicon-comment"></span>
		            			Comments		            					            		</a>
		            	</li>
					
											<li class="dropdown">
							<a href="<?php echo base_url(); ?>admin/messages" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
								<span class="glyphicon glyphicon-envelope"></span> Messages	<?php if($this->session->userdata('newmsg'))
								{?><span class="label label-danger"><?php echo $this->session->userdata('newmsg') ?></span><?php }	?>														<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>admin/messages">All Messages</a></li>
								
								<li><a href="<?php echo base_url(); ?>admin/addnewmessage">New Message</a></li>
							
								<li><a href="javascript:EasyLogin.admin.composeEmail()">Compose E-mail</a></li>
							</ul>
						</li>
	
						          	</ul>
	          	<ul class="nav navbar-nav navbar-pull-right">
	          		<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
							Admin							<img src="http://crosbyequine.com/assets/img/avatar.png" class="avatar"> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('users/index/').$this->session->userdata('user_id'); ?>">Profile</a></li>
						
							<li><a href="<?php echo base_url(); ?>admin/settings">Settings</a></li>
							
							<li><a href="<?php echo base_url('admin/logout'); ?>">Log out</a></li>
						</ul>
					</li>
	          	</ul>
        	</div>
<?php		} 
	else { ?>	
			
        	<div class="navbar-collapse collapse">
	          	<ul class="nav navbar-nav">
				<? $perm = $this->session->userdata('permissions');
			if (in_array("dashboard", $perm)) ?>
	            	<li class="">
	            		<a href="<?php echo base_url(); ?>admin/dashboard"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
  </li> 				
	            			            	<li class="dropdown">
							<a href="<?php echo base_url(); ?>admin/users" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
								<span class="glyphicon glyphicon-user"></span> Users <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
						<?php			if (in_array("list_users", $perm))
										{ ?>

																	<li><a href="<?php echo base_url(); ?>admin/users">All Users</a></li>
										<?php } ?>
									<?php			if (in_array("add_users", $perm))
										{ ?>										
																	<li><a href="<?php echo base_url(); ?>admin/addnewuser">Add New</a></li>
										<?php } ?>	
									<?php			if (in_array("manage_roles", $perm))
									{ ?>
																	<li><a href="<?php echo base_url(); ?>admin/roles">Roles</a></li>
									<?php } ?>
								
															</ul>
						</li>
					
											<li class="">
		            		<a href="<?php echo base_url(); ?>admin/comments">
		            			<span class="glyphicon glyphicon-comment"></span>
		            			Comments		            					            		</a>
		            	</li>
					
											<li class="dropdown">
							<a href="<?php echo base_url(); ?>admin/messages" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
								<span class="glyphicon glyphicon-envelope"></span> Messages	<?php if($this->session->userdata('newmsg'))
								{?><span class="label label-danger"><?php echo $this->session->userdata('newmsg') ?></span><?php }	?>														<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>admin/messages">All Messages</a></li>
									<?php			if (in_array("message_users", $perm))
									{ ?>
								<li><a href="<?php echo base_url(); ?>admin/addnewmessage">New Message</a></li>
									<?php } ?>
								<li><a href="javascript:EasyLogin.admin.composeEmail()">Compose E-mail</a></li>
							</ul>
						</li>
	
						          	</ul>
	          	<ul class="nav navbar-nav navbar-pull-right">
	          		<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
							Admin							<img src="http://crosbyequine.com/assets/img/avatar.png" class="avatar"> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('users/index/').$this->session->userdata('user_id'); ?>">Profile</a></li>
							<?php			if (in_array("manage_settings", $perm))
									{ ?>
							<li><a href="<?php echo base_url(); ?>admin/settings">Settings</a></li>
									<?php } ?>
							<li><a href="<?php echo base_url('admin/logout'); ?>">Log out</a></li>
						</ul>
					</li>
	          	</ul>
        	</div>
			
			<?php } ?>	
      	</div>
    </div>
	   <!-- Compose email Modal -->
	<div class="modal fade" id="composeModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<form action="<?php echo base_url('admin/send_mail'); ?>" enctype="multipart/form-data" method="POST" >
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

			            <div class="help-block">You can add multiple emails separated with a semicolon (,)</div>
						<div class="form-group text-center"><input type="file" name="files[]" multiple /></div>
						

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
