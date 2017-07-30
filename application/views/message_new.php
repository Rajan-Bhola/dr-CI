
	<script type="text/javascript">	  
		/* $( document ).ready ( function () {
			
			$('#nickname').keyup(function() {
				var nickname = $(this).val();
				
				if(nickname == ''){
					$('#msg_block').hide();
				}else{
					$('#msg_block').show();
				}
			});
			
			// initial nickname check
			$('#nickname').trigger('keyup');
		});
		 */
		
	</script>
<div class="container">
<h3 class="page-header">Messages with Admin</h3>
<p><a href="?page=messages">← Back to Messages</a></p>

<div class="row">
	<div class="col-md-6">
		<div class="conversation">
		<ul class="pm-list" id="received">
		
		
		</ul>
		
		
		</div>
		<br>
				
		
		<input name="sender_id" id="sender_id" value="<?php echo $datas->id; ?>" type="hidden">
		
		        
				<input type="hidden" name="group" value="user">

			<div class="form-group">
		        <textarea name="message" id="message" class="form-control" rows="4"></textarea>
		    </div>

            <div class="form-group">
				<button  id="submit" name="submit" class="btn btn-primary">Send message</button>
			</div>
		</form>
	</div>
</div>
</div>
<script>

var sender_id = '<?php echo  $this->session->userdata('user_id');   ?>';
var group = $('#group').val()


var sendChat = function (message, callback) {
	$.getJSON('<?php echo base_url(); ?>api/send_message?message='+ message +'&sender_id=' + sender_id + '&group='+ group , function (data){
		//callback();
	});
}

var append_chat_data = function (chat_data) {
	var html="";
	chat_data.forEach(function (data) {
		var is_me = '10';
		
		if(data.sender_id == sender_id){
			 html += '<li class="right clearfix">';
			html += '	<span class="chat-img pull-right">';
			html += '		<img src="http://placehold.it/50/FA6F57/fff&text=' + data.sender_id.slice(0,2) + '" alt="User Avatar" class="img-circle" />';
			html += '	</span>';
			html += '	<div class="chat-body clearfix">';
			html += '		<div class="header">';
			//html += '			<small class="text-muted"><span class="glyphicon glyphicon-time"></span>' + parseTimestamp(data.timestamp) + '</small>';
			html += '			<strong class="pull-right primary-font">' + data.sender_id + '</strong>';
			html += '		</div>';
			html += '		<p>' + data.message + '</p>';
			html += '	</div>';
			html += '</li>';
		}else{
		  
			 html = '<li class="left clearfix">';
			html += '	<span class="chat-img pull-left">';
			html += '		<img src="http://placehold.it/50/55C1E7/fff&text=Admin" alt="User Avatar" class="img-circle" />';
			html += '	</span>';
			html += '	<div class="chat-body clearfix">';
			html += '		<div class="header">';
			html += '			<strong class="primary-font">Admin</strong>';
			//html += '			<small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>' + parseTimestamp(data.timestamp) + '</small>';
			
			html += '		</div>';
			html += '		<p>' + data.message + '</p>';
			html += '	</div>';
			html += '</li>';
		}
		
	});
	
  $("#received").html( html);
	$('#received').animate({ scrollTop: $('#received').height()}, 1000);
}

var update_chats = function () {
	
	$.getJSON('<?php echo base_url(); ?>api/get_messages?sender_id='+ sender_id , function (data){
		append_chat_data(data);	

		
	});      
}	

$('#submit').click(function () {
	
	
	var field = $('#message');
	var data = field.val();

	
	sendChat(data);
});

$('#message').keyup(function (e) {
	if (e.which == 13) {
		$('#submit').trigger('click');
	}
});

setInterval(function (){
	update_chats();
}, 4500);

</script>