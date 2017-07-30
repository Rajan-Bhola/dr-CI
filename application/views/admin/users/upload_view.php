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
				<form class='text-center' enctype="multipart/form-data" action="<?php echo base_url('users/upload_file/')."$id"; ; ?>" method="POST">
				<div class="form-group">
			        <label for="username">Upload Files	 <em>(required)</em></label>
					<?php echo form_error('username'); ?>
				<div class="form-group text-center"><input type="file" name="files[]" multiple /></div>
			    </div>
				  <div class="form-group">
				<input type="submit" name="submit" value="Add New User" class="btn btn-primary">
			</div>
			</form>
 
  </div>
 </div>
 </div>