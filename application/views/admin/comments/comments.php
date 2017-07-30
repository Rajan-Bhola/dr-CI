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
<h3 class="page-header">Comments</h3>

<link href="http://crosbyequine.com/assets/css/vendor/dataTables.bootstrap.css" rel="stylesheet">
<script src="http://crosbyequine.com/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="http://crosbyequine.com/assets/js/vendor/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function() {
		EasyLogin.options.datatables = {"emptyTable":"No matching records where found.","info":"Showing _START_ to _END_ of _TOTAL_ entries","infoEmpty":"","infoFiltered":"","infoPostFix":"","thousands":",","lengthMenu":"Show _MENU_ entries","loadingRecords":"Loading...","processing":"Processing...","search":"Search: ","zeroRecords":"No matching records where found.","paginate":{"first":"First","last":"Last","next":"&rsaquo;","previous":"&lsaquo;"},"aria":{"sortAscending":": activate to sort column ascending","sortDescending":": activate to sort column descending"}};
		EasyLogin.admin.commentsDT();
	});
</script>


<form action="comments_bulk_action" method="POST" id="comments_form" class="ajax-form">
	<div style="display: none"><div class="alert"></div></div>

	<ul class="dt-filter status-filter">
		<li class="active"><a href="#" data-status="">All</a> |</li>

		<li><a href="#" data-status="1">Approved</a> |</li>

		<li>
			<a href="#" data-status="0">
				Pending				<span class="count">(0)</span>
			</a> |
		</li>

		<li>
			<a href="#" data-status="2">
				Trash				<span class="count">(0)</span>
			</a>
		</li>
	</ul>

	<div id="comments_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="row"><div class="col-xs-6"><div class="dataTables_length" id="comments_length"><label>Show <select name="comments_length" aria-controls="comments" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-xs-6"><div id="comments_filter" class="dataTables_filter"><label>Search: <input class="form-control input-sm" aria-controls="comments" type="search"></label></div></div></div><table class="table table-striped table-bordered table-hover table-dt dataTable no-footer" id="comments" role="grid" aria-describedby="comments_info">
		<thead>
			<tr role="row"><th class="comment-cb sorting_disabled" rowspan="1" colspan="1"><input class="select-all" value="1" type="checkbox"></th><th class="column-user sorting_disabled" rowspan="1" colspan="1">User</th><th class="column-comment sorting_disabled" rowspan="1" colspan="1">Comment</th><th class="column-date sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1">Date</th><th class="column-response sorting_disabled" rowspan="1" colspan="1">In Response To</th><th class="column-action sorting_disabled" rowspan="1" colspan="1">Action</th></tr>
		</thead>
		<tbody>
		</tbody>
	</table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="comments_info" role="status" aria-live="polite"></div></div><div class="col-xs-6"><div class="dataTables_paginate paging_simple_numbers" id="comments_paginate"></div></div></div></div>
</form>

<!-- Commen reply Modal -->
<div class="modal fade" id="commentReplyModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form action="comment_reply" class="ajax-form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Reply to <b class="user"></b></h4>
				</div>
				<div class="modal-body">
					<div class="alert"></div>
					<input name="id" type="hidden">
		          	
		          	<div class="form-group">
				        <label for="content">Comment</label>
				        <textarea type="text" name="content" id="content" class="form-control" rows="5"></textarea>
				    </div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Reply</button>
				</div>
			</form>
		</div>
	</div>
</div>

	</div>