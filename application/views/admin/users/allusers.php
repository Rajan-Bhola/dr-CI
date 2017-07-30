<?php
$perm = $this->session->userdata('permissions');
$perm = $perm->permissions;
$perm = explode(',',$perm);
?>
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
   
<h3 class="page-header">
	Users	<a href="<?php echo base_url(); ?>admin/addnewuser" class="btn btn-default btn-sm">Add New</a>
</h3>

<link href="http://crosbyequine.com/assets/css/vendor/dataTables.bootstrap.css" rel="stylesheet">
<script src="http://crosbyequine.com/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="http://crosbyequine.com/assets/js/vendor/dataTables.bootstrap.js"></script>



<form action="" method="POST" id="users_form">
	<ul class="dt-filter role-filter">
				<li class="active">
			<a href="<?php echo base_url(); ?>admin/users" data-role="">All				<span class="count">(<?php echo $all; ?>)</span>
			</a> 
		</li>
		<?php $i=0; foreach($roles as $role) { ?>
					<li> |
				<a href="<?php echo base_url().'admin/administrator/'.$role->name;  ?>" data-role="Administrator"><?php echo $role->name; ?>
					<span class="count">(<?php echo $roles_num_rows[$i]; ?>)</span>
				</a>
							</li>
<?php	$i++;	} ?>
					<!--li>
				<a href="<?php //echo base_url(); ?>admin/user" data-role="User">User 
					<span class="count">(<?php //echo $user_count; ?>)</span>
				</a>
							</li-->
			</ul>
	<div id="users_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="row"><div class="col-xs-6"><button type="submit" class="btn btn-danger btn-sm delete-bulk" disabled="">Delete</button><div class="dataTables_length" id="users_length"><label>Show <select name="users_length" aria-controls="users" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-xs-6"><div id="users_filter" class="dataTables_filter"><label>Search: <input class="form-control input-sm" aria-controls="users" type="search"></label></div></div></div><table class="table table-striped table-bordered table-hover table-dt dataTable no-footer" id="users" role="grid" aria-describedby="users_info" style="width: 1140px;">
		<thead>
			<tr role="row">
			<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 38px;" aria-label=""><input class="select-all" value="1" type="checkbox"></th>
			<th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 93px;" aria-label="Username: activate to sort column ascending">Username</th>
			<th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 247px;" aria-label="E-mail: activate to sort column ascending">E-mail</th>
			<th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 123px;" aria-label="Display name: activate to sort column ascending">Display name</th>
			<th class="sorting_desc" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 105px;" aria-sort="descending" aria-label="Joined: activate to sort column ascending">Joined</th>
			<th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 134px;" aria-label="Account Status: activate to sort column ascending">Account Status</th>
			<th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 111px;" aria-label="Role: activate to sort column ascending">Role</th>
			<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 79px;" aria-label="Action">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $user)
{
	
	?>
		<tr role="row" class="odd">
		<td><input name="users[<?php echo $user->id; ?>]" value="users[<?php echo $user->id; ?>]" class="chb-select" type="checkbox"></td>
		<td><a href="<?php echo base_url('users/index/')."$user->id"; ?>" target="_blank"><?php echo $user->username; ?></a></td>
		<td><?php echo $user->email; ?></td>
		<td><?php echo $user->firstname; ?></td>
		<td class="sorting_1"><span title="2017-06-28 02:16:38"><?php echo $user->birthday; ?></span></td>
		<td><span class="label label-success"><?php echo $user->status; ?></span></td>
		<td><?php echo $user->role; ?></td>
		<td><a href="<?php echo base_url('users/upload/')."$user->id"; ?>" title="Upload Files"><span class="glyphicon glyphicon-upload"></span></a> <a href="<?php echo base_url('users/gallery/')."$user->id"; ?>" title="Gallery"><span class="glyphicon glyphicon-th"></span></a> <a href="<?php echo base_url('users/index/')."$user->id"; ?>" title="Edit this user">
			<?php			if (in_array("edit_users", $perm))
										{ ?><span class="glyphicon glyphicon-edit"></span></a> <a href="<?php echo base_url('users/edituser/')."$user->id"; ?>" title="Send Message"> <?php } ?>
									<span class="glyphicon glyphicon-share-alt"></span></a> <a href="javascript:EasyLogin.admin.composeEmail('<?php echo $user->email; ?>')" title="Send E-mail"><span class="glyphicon glyphicon-envelope"></span></a> 
										<?php			if (in_array("edit_users", $perm))
										{ ?><a href="<?php echo base_url('users/deleteuser/')."$user->id"; ?>" title="Delete this user"><span class="glyphicon glyphicon-trash"></span></a>
										<?php } ?></td>
		</tr>
		
<?php
}
?>
		</tbody>
	</table>
	<div class="row"><div class="col-xs-6"><div class="dataTables_info" id="users_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_simple_numbers" id="users_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="users" tabindex="0" id="users_previous"><a href="#">‹</a></li><li class="paginate_button active" aria-controls="users" tabindex="0"><a href="#">1</a></li><li class="paginate_button next disabled" aria-controls="users" tabindex="0" id="users_next"><a href="#">›</a></li></ul></div></div></div></div>
</form>

<!-- Delete user Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form action="deleteUser" class="ajax-form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Confirm action</h4>
				</div>
				<div class="modal-body">
					<div class="alert"></div>
					<input name="user_id" type="hidden">
	          		<p>Are you sure you want to permanently delete the user <b class="user"></b> ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-danger">Yes</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Delete users Modal -->
<div class="modal fade" id="deleteUsersModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form action="deleteUsers" class="ajax-form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Confirm action</h4>
				</div>
				<div class="modal-body">
					<div class="alert"></div>
					<input name="users" type="hidden">
	          		<p>Are you sure you want to permanently delete <b class="users"></b> users ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-danger">Yes</button>
				</div>
			</form>
		</div>
	</div>
</div>

	</div>