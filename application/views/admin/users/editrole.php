<div class="container">
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
<h3 class="page-header">Edit Role</h3>
<p><a href="<?php echo base_url('admin/roles'); ?>">← Back to Roles</a></p>

<div class="row">
	<div class="col-md-6">
					
			
				
			
			<form action="<?php echo base_url().'admin/update_role/'.$roles->id; ?>" method="POST">
				<div class="form-group">
			        <label for="name">Name</label>
			        <input name="name" id="name" value="<?php echo $roles->name; ?>" class="form-control" type="text">
			    </div>
			    
			    <div class="form-group">
			    	<label for="permissions">Permissions</label> (separated by comma)			    	<textarea name="permissions" id="permissions" class="form-control" rows="3"><?php echo $roles->permissions; ?></textarea>
			    </div>
			    
			    <div class="form-group">
			    	<button type="submit" name="submit" class="btn btn-primary">Update Role</button>
			    </div>
			</form>

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
</div>

	</div>