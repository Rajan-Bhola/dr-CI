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
	<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />
	<!--link href="<?php //echo base_url(); ?>assets/css/flat.css" rel="stylesheet" type="text/css" /-->
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.11.1.min.js" type="text/javascript"></script>	
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>	
    <script src="<?php echo base_url(); ?>assets/js/easylogin.js" type="text/javascript"></script>	
    <script src="<?php echo base_url(); ?>assets/js/admin.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom2.js" type="text/javascript"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js
" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


</head>
<body>


<div class="navbar navbar-fixed-top navbar-top">
    	<div class="container">
		<input type="hidden" id="base_url" value="<?php echo base_url();  ?>"/>
        	<div class="navbar-header">
         		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            		<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          		<a href="<?php echo base_url(); ?>" class="navbar-brand">EL<sup>PRO</sup></a>
        	</div>
        	<div class="navbar-collapse collapse">
	          	<ul class="nav navbar-nav">
	            	<li>
      					<a href="comments.php">Comments</a>
      				</li>
	          	</ul>
				<?php	if(!empty($this->session->userdata('user_id')))
			{ ?>
				<ul class="nav navbar-nav navbar-pull-right">

	          			          			
	          			<li>
	          				<a href="<?php echo base_url().'frontend/messages' ?>" class="nav-btn pm-open-modal" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Private Messages">
					<?php		if($this->session->userdata('newmsg'))
							{ ?>
	          					<span class="label label-danger pm-notification" style="opacity: 1;"><?php echo $this->session->userdata('newmsg');?></span>
					<?php		} ?>
	          					<span class="glyphicon glyphicon-envelope"></span>
	          				</a>
	          			</li>

	          			<li class="dropdown ">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
								<?php echo $users->username; ?>	<img src="http://crosbyequine.com/assets/img/avatar.png" class="avatar"> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('frontend/profile/')."$users->id"; ?>">Profile</a></li>
								<li><a href="<?php echo base_url('frontend/gallery/')."$users->id"; ?>">Gallery</a></li>
								<li><a href="<?php echo base_url('frontend/settings/')."$users->id"; ?>">Settings</a></li>
								<li><a href="<?php echo base_url('frontend/logout'); ?>">Log out</a></li>
							</ul>
						</li>
						          	</ul>
			<?php } 
			else
			{?>					
	          	<ul class="nav navbar-nav navbar-pull-right">

	          				          		<!--
		          		<li><a href="login.php">Log in</a></li>
		          		<li><a href="signup.php">Sign up</a></li>
		          		-->
		          		
		          		<li><a href="<?php echo base_url('frontend/login'); ?>" data-toggle="modal" data-target="">Log in</a></li>
		          		<li><a href="<?php echo base_url('frontend/register'); ?>" data-toggle="modal" data-target="">Sign up</a></li>
		          		
		          		<li class="dropdown">
		          										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Language: English<b class="caret"></b></a>
							<ul class="dropdown-menu">
															</ul>
						</li>
						          	</ul>
			<?php } ?>
        	</div>
      	</div>
    </div>