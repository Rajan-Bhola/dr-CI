<div class="container">
<?php if( $feedback = $this->session->flashdata('feedback')): 
		$feedback_class = $this->session->flashdata('feedback_class');
	?>
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="alert alert-dismissible <?= $feedback_class ?>">
          <?= $feedback ?>
        </div>
      </div>
    </div>
<?php endif; ?>
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
<h3 class="page-header">User Roles</h3>
<div class="row">
	<div class="col-md-6">
		
			</div>
</div>

<div class="row">
	<div class="col-md-6">
		<h4>Roles</h4>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Permissions</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($roles as $role)
			{ ?>
							<tr>
					<td><?php echo $role->name; ?></td>
					<td class="word-break">
					<?php $pers = explode(",",$role->permissions); 
					foreach ($pers as $per)
					{?>
					<span class="label label-default"><?php echo $per; ?></span><?php } ?> 					</td>
					<td>
						<a href="<?php echo base_url('users/editrole/')."$role->id"; ?>" title="Edit Role">
							<span class="glyphicon glyphicon-edit"></span></a> 
						<a href="<?php echo base_url('users/deleterole/')."$role->id"; ?>" title="Delete Role">
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>
				</tr>
		<?php	} ?>
				
						</tbody>
		</table>
		
		Available Permissions: <br>
		<span class="label label-default">dashboard</span>
		<span class="label label-default">add_users</span>
		<span class="label label-default">list_users</span>
		<span class="label label-default">edit_users</span>
		<span class="label label-default">delete_users</span>
		<span class="label label-default">message_users</span>
		<span class="label label-default">manage_roles</span>
		<span class="label label-default">manage_fields</span>
		<span class="label label-default">manage_settings</span>
		<span class="label label-default">moderate</span>
	</div>

	<div class="col-md-6">
		<h4>Add New Role</h4>
		
		
		<form action="<?php echo base_url('users/addrole'); ?>" method="POST">
			<div class="form-group">
		        <label for="name">Name</label>
				<?php echo form_error('name'); ?>
		        <input name="name" id="name" value="" class="form-control" type="text">
		    </div>

		    <div class="form-group">
		    	<label for="permissions">Permissions</label> (separated by comma)
				<?php echo form_error('permissions'); ?>
		    	<textarea name="permissions" id="permissions" class="form-control" rows="3"></textarea>
		    </div>
		    
		    <div class="form-group">
		    	<input type="submit" name="submit" value="Add New Role"	class="btn btn-primary">
		    </div>
		</form>
	</div>
</div>

	</div>