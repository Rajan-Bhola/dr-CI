
<?php
include_once('header.php');
 echo form_open(site_url()."/Register/insert"); ?>
  <fieldset>
    <legend>Legend</legend>
    <?php 
	echo form_label('Username ', 'username');
	$data = array(
        'name'  => 'username',
        'placeholder' => 'username',
        
);

		echo form_input($data); ?>
  <br>
<?php 
		echo form_label('Password ', 'password');
		
		$data = array(
        'name'  => 'password',
        
        
);
		echo form_password($data); ?>
 <br>
 <?php
    echo form_label('Address ', 'address');
 
  $data = array(
        'name'  => 'address',
		);
 echo  form_textarea($data); ?>
   <br>
   <?php 
   echo form_submit('submit', 'Submit');
   ?>
  </fieldset>
<?php echo form_close();
include_once('footer.php'); ?>
