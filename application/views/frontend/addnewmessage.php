<style> #search {  outline: medium none; padding: 8px;  border-radius: 2px; -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px;  } 
#finalResult ul { width: 300px; margin: 0px; padding-left: 0px; } 
#finalResult li { list-style: none; background-color: lightgray; margin: 1px; padding: 1px; -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; }
 </style>
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
<h3 class="page-header">New Message</h3>
<div class="row">
	<div class="col-md-6">
		
				
		<form action="<?php echo base_url('admin/addmessage'); ?>" method="POST">
			<div class="form-group search-user">
		        <label for="to">To User</label>
		        <input name="username"  id="search" value="" class="form-control search" autocomplete="off" type="text">
				<ul id="finalResult"></ul>
		        <input name="sender_id" id="sender_id" value="<?php echo $this->session->userdata('user_id'); ?>" type="hidden">
		        <input name="sendername" id="sendername" value="<?php echo $users->username; ?>" type="hidden">
		        <input name="receivername" id="receivername" value="" type="hidden">
		        <input name="receiver_id" id="receiver_id" value="" type="hidden">
		    	<div class="list-group"></div>
		    </div>

			<div class="form-group">
				<label for="group">To Group</label>
				<select name="groupp" id="group" class="form-control">
					<option value=""></option>
					<option value="all">All</option>
					<?php foreach($roles as $role) { ?>
					<option value="<?php echo $role->name; ?>"><?php echo $role->name; ?></option>
				<?php } ?>
									</select>
			</div>

		    <div class="form-group">
		        <label for="message">Message</label>
		        <textarea name="message" id="message" class="form-control" rows="4"></textarea>
		    </div>

            <div class="form-group">
				<input type="submit" value="Send Message" name="submit" class="btn btn-primary"/>
			</div>
		</form>
	</div>
</div>
</div>