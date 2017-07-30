<?php
include_once('header.php');?>
<style>
 html, body, .container-table {
    height: 100%;
}
.container-table {
    display: table;
}
.vertical-center-row {
    display: table-cell;
    vertical-align: middle;
}
</style>
<div class="container container-table">
    <div class="row vertical-center-row">
		<div "text-center col-md-4 col-md-offset-4">
<?php
if(!isset($this->session->name))
{
	
 echo form_open(site_url()."/Register/check","class='text-center'"); 
  echo form_submit('submit', 'Login', "class='btn btn-primary'");
  echo form_submit('submit', 'Register' ,"class='btn btn-primary'");
  echo form_close(); 
}
 if(isset($this->session->name)) { 
	   echo "<div class='text-center'>Hello ".$this->session->name."<br>";?>
		<a href="<?php echo site_url()."/login/allrecords"?>" class="btn btn-primary">All Records</a></div>
		<?php
	 }
	 ?>
 
  </div>
 </div>
 </div>
  <?php
  include_once('footer.php');?>