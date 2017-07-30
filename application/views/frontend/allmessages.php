<div class="container">
<h3 class="page-header">
	Messages	<a href="<?php echo base_url(); ?>frontend/addnewmessage" class="btn btn-default btn-sm">New Message</a>
</h3>
<form action="" method="POST" id="messages_form">
	<div id="messages_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="row"><div class="col-xs-6"><button type="submit" class="btn btn-danger btn-sm delete-bulk" disabled="">Delete</button><div class="dataTables_length" id="messages_length"><label>Show <select name="messages_length" aria-controls="messages" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-xs-6"></div></div><table class="table table-striped table-bordered table-hover table-dt dataTable no-footer" id="messages" role="grid" aria-describedby="messages_info" style="width: 1140px;">
		<thead>
			<tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 120px;"><input class="select-all" value="1" type="checkbox"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 222px;">Message</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 212px;">From/To</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 276px;">Date</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 177px;">Action</th></tr>
		</thead>
		<tbody>
		<?php foreach ($datas as $user)
{
	
	?>
		<tr role="row" class="<?php if($user->status == 0) { echo 'info'; } ?> odd">
		<td><input name="messages[]" value="2" class="chb-select" type="checkbox"></td>
		<td></span><a href="<?php echo base_url()."frontend/view_message?sender_id=$user->sender_id&message_id=$user->id";?>" title="Reply"><?php echo $user->message; ?></a></td>
		<td><?php echo $user->sendername; ?>/<?php echo $user->receivername; ?></td>
		<td><span title="2017-06-29 04:56:39"><?php echo $user->timestamp; ?></span></td>
		<td><a href="<?php echo base_url()."frontend/view_message?sender_id=$user->sender_id&message_id=$user->id";?>" title="Reply"><span class="glyphicon glyphicon-share-alt"></span></a> <a href="<?php echo base_url().'admin/message_delete/'.$user->id; ?>" title="Delete this conversation"><span class="glyphicon glyphicon-trash"></span></a></td>
		</tr>
<?php } ?>
	<?php foreach ($new as $n)
{ ?>
	<tr role="row" class="<?php if($n->status == 0) { echo 'info'; } ?> odd">
		<td><input name="messages[]" value="2" class="chb-select" type="checkbox"></td>
		<td><a href="<?php echo base_url()."frontend/view_message?sender_id=$n->sender_id&message_id=$n->id";?>" title="Reply"><?php echo $n->message; ?></a></td>
		<td><?php echo $n->sendername; ?>/<?php echo $n->receivername; ?></td>
		<td><span title="2017-06-29 04:56:39"><?php echo $n->timestamp; ?></span></td>
		<td><a href="<?php echo base_url()."frontend/view_message?sender_id=$n->sender_id&message_id=$n->id";?>" title="Reply"><span class="glyphicon glyphicon-share-alt"></span></a> <a href="<?php echo base_url().'frontend/message_delete/'.$n->id; ?>" title="Delete this conversation"><span class="glyphicon glyphicon-trash"></span></a></td>
		</tr>
<?php } ?>
		</tbody>
		</table>
		<div class="row"><div class="col-xs-6"><div class="dataTables_info" id="messages_info" role="status" aria-live="polite"></div></div><div class="col-xs-6"><div class="dataTables_paginate paging_simple_numbers" id="messages_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="messages" tabindex="0" id="messages_previous"><a href="#">‹</a></li><li class="paginate_button next disabled" aria-controls="messages" tabindex="0" id="messages_next"><a href="#">›</a></li></ul></div></div></div></div>
</form>

<!-- Delete conversation Modal -->
<div class="modal fade" id="deleteConversationModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form action="deleteConversation" class="ajax-form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Confirm action</h4>
				</div>
				<div class="modal-body">
					<div class="alert"></div>
					<input name="user_id" type="hidden">
	          		<p>Are you sure you want to permanently delete the conversation with <b class="user"></b> ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-danger">Yes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete conversations Modal -->
<div class="modal fade" id="deleteConversationsModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form action="deleteConversations" class="ajax-form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Confirm action</h4>
				</div>
				<div class="modal-body">
					<div class="alert"></div>
					<input name="conversations" type="hidden">
	          		<p>Are you sure you want to permanently delete <b class="conversations"></b> conversations ?</p>
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