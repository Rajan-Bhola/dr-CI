<html>
<head>
	<link href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.css" rel="stylesheet" type="text/css" />
	
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">About</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
	 
        <li><a href="<?php echo site_url()."register/register" ?>">Register</a></li>
  <?php     if(!isset($this->session->name)) 
  { ?>
		<li><a href="<?php echo site_url()."login" ?>">Login</a></li>
 <?php }
 else{
	 ?>
	 <li><a href="<?php echo site_url()."login/logout" ?>">Logout</a></li>
	 <?php
 }
 ?>
      </ul>
    </div>
  </div>
</nav>