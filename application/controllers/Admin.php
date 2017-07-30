<?php
class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('adminmodel','users');
		//$this->load->model('usermodel','users');
	
	}
	public function index()
	{
		if( $this->session->userdata('user_id') )
			return redirect('admin/dashboard');
		$this->load->view('admin/include/header_login');
		$this->load->view('admin/login');
	}
	public function login()
	{
		if( $this->session->userdata('user_id') )
			return redirect('admin/dashboard');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$login_id = $this->users->login_valid($username, $password);
			if( $login_id ) {
				
				$this->session->set_userdata('user_id', $login_id );
				$users = $this->users->find($this->session->userdata('user_id'));
				$permission = $this->users->userroles($users->role);
				$this->session->set_userdata('permissions',$permission);
				return redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('login_failed','Invalid Username/Password.');
				return redirect('admin');
			}
		
	}
	public function dashboard()
	{
		
		$users = $this->users->find($this->session->userdata('user_id'));
		if($users->role == 'User')
		{
			return redirect('admin/restricted_access');
		}
		$newmsg = $this->users->newmsg();
		$this->session->set_userdata('newmsg', count($newmsg) );
		$status['total'] = $this->users->num_rows();
		$status['activated'] = $this->users->users('activated');
		$status['unactivated'] = $this->users->users('unactivated');
		$status['suspended'] = $this->users->users('suspended');
		$latest = $this->users->dashboard_users_list();
		$this->load->view('admin/include/header');
		$this->load->view('admin/dashboard',compact('status','latest'));
		$this->load->view('admin/include/footer');
	}
	public function users()
	{
		$newmsg = $this->users->newmsg();
		$this->session->set_userdata('newmsg', count($newmsg) );
		$config = [
			'base_url'			=>	base_url('admin/users/allusers'),
			'per_page'			=>	5,
			'total_rows'		=>	$this->users->num_rows(),
			'full_tag_open'		=>	"<ul class='pagination'>",
			'full_tag_close'	=>	"</ul>",
			'first_tag_open'	=>	'<li>',
			'first_tag_close'	=>	'</li>',
			'last_tag_open'		=>	'<li>',
			'last_tag_close'	=>	'</li>',
			'next_tag_open'		=>	'<li>',
			'next_tag_close'	=>	'</li>',
			'prev_tag_open'		=>	'<li>',
			'prev_tag_close'	=>	'</li>',
			'num_tag_open'		=>	'<li>',
			'num_tag_close'		=>	'</li>',
			'cur_tag_open'		=>	"<li class='active'><a>",
			'cur_tag_close'		=>	'</a></li>',
		];
		$this->pagination->initialize($config);
		$users = $this->users->users_list( $config['per_page'], $this->uri->segment(3) );
		$this->load->view('admin/include/header');
		$all = $this->users->num_rows();
		$roles = $this->users->roles();
		foreach($roles as $role)
		{
		$roles_num_rows[] = $this->users->roles_num_rows($role->name);
		}
		$this->load->view('admin/users/allusers', ['users'=>$users,'all'=>$all,'roles'=>$roles,'roles_num_rows'=>$roles_num_rows]);
		$this->load->view('admin/include/footer');
		
	}
	public function administrator($name)
	{
		$config = [
			'base_url'			=>	base_url('admin/users/allusers'),
			'per_page'			=>	5,
			'total_rows'		=>	$this->users->admin_count($name),
			'full_tag_open'		=>	"<ul class='pagination'>",
			'full_tag_close'	=>	"</ul>",
			'first_tag_open'	=>	'<li>',
			'first_tag_close'	=>	'</li>',
			'last_tag_open'		=>	'<li>',
			'last_tag_close'	=>	'</li>',
			'next_tag_open'		=>	'<li>',
			'next_tag_close'	=>	'</li>',
			'prev_tag_open'		=>	'<li>',
			'prev_tag_close'	=>	'</li>',
			'num_tag_open'		=>	'<li>',
			'num_tag_close'		=>	'</li>',
			'cur_tag_open'		=>	"<li class='active'><a>",
			'cur_tag_close'		=>	'</a></li>',
		];
		$this->pagination->initialize($config);
		$users = $this->users->admin_users_list( $config['per_page'], $this->uri->segment(3) ,$name);
		$this->load->view('admin/include/header');
		$all = $this->users->num_rows();
		$admin_count = $this->users->admin_count($name);
		$roles = $this->users->roles();
		foreach($roles as $role)
		{
		$roles_num_rows[] = $this->users->roles_num_rows($role->name);
		}
		$this->load->view('admin/users/allusers', ['users'=>$users,'all'=>$all,'roles'=>$roles,'roles_num_rows'=>$roles_num_rows]);
		$this->load->view('admin/include/footer');
		
	}
	
	public function addnewuser()
	{
		$roles = $this->users->roles();
		$this->load->view('admin/include/header');
		$this->load->view('admin/users/addnewuser',compact('roles'));
		$this->load->view('admin/include/footer');
	}
	public function roles()
	{
		$roles = $this->users->roles();
		$this->load->view('admin/include/header');
		$this->load->view('admin/users/roles',compact('roles'));
		$this->load->view('admin/include/footer');
	}
	public function comments()
	{
		$this->load->view('admin/include/header');
		$this->load->view('admin/comments/comments');
		$this->load->view('admin/include/footer');
	}
	public function messages()
	{
		$newmsg = $this->users->newmsg();
		$this->session->set_userdata('newmsg', count($newmsg) );
		$config = [
			'base_url'			=>	base_url('admin/messages'),
			'per_page'			=>	50,
			'total_rows'		=>	$this->users->message_num_rows(),
			'full_tag_open'		=>	"<ul class='pagination'>",
			'full_tag_close'	=>	"</ul>",
			'first_tag_open'	=>	'<li>',
			'first_tag_close'	=>	'</li>',
			'last_tag_open'		=>	'<li>',
			'last_tag_close'	=>	'</li>',
			'next_tag_open'		=>	'<li>',
			'next_tag_close'	=>	'</li>',
			'prev_tag_open'		=>	'<li>',
			'prev_tag_close'	=>	'</li>',
			'num_tag_open'		=>	'<li>',
			'num_tag_close'		=>	'</li>',
			'cur_tag_open'		=>	"<li class='active'><a>",
			'cur_tag_close'		=>	'</a></li>',
		];
		$this->pagination->initialize($config);
		$users = $this->users->message_list( $config['per_page'], $this->uri->segment(3) );
		$new = $this->users->new_message_list( $config['per_page'], $this->uri->segment(3) );
		$this->load->view('admin/include/header');
		$all = $this->users->num_rows();
		$roles = $this->users->roles();
		$this->load->view('admin/include/header');
		$this->load->view('admin/messages/allmessages',compact('users','new'));
		$this->load->view('admin/include/footer');
	}
	
	public function settings()
	{
		$users = $this->users->find( $this->session->userdata('user_id') );
		$this->load->view('admin/include/header');
		$this->load->view('admin/settings',compact('users'));
		$this->load->view('admin/include/footer');
	}
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('newmsg');
		return redirect('admin');
	}
	public function addnewmessage()
	{
		$users = $this->users->find( $this->session->userdata('user_id') );
		$roles = $this->users->roles();
		$this->load->view('admin/include/header');
		$this->load->view('admin/messages/addnewmessage',compact('roles','users'));
		$this->load->view('admin/include/footer');
	}
	public function search()
	{ 
		 $search= $this->input->post('search'); 
		 $query = $this->users->search($search); 
		 echo json_encode ($query); 
	}
	
	public function addmessage()
	{
		/* print_r($_POST);
		die; */
		if( $this->form_validation->run('add_message_rules'))
		{
			$post = $this->input->post();
			unset($post['username']);
			unset($post['submit']);
			$data = $this->users->addnewmessage($post);
			return $this->_falshAndRedirect(
						$data,
						"Message Sent Successully.",
						"Failed To Sent Message, Please Try Again.",
						"admin/addnewmessage"
					);
		}
		 else {
				$roles = $this->users->roles();
				$this->load->view('admin/include/header');
				$this->load->view('admin/messages/addnewmessage',compact('roles'));
				$this->load->view('admin/include/footer');

		}
	}
	public function view_message()
	{
		$rec = $this->input->get('sender_id');
		$msgid = $this->input->get('message_id');
		$users = $this->users->find($this->session->userdata('user_id') );
		$this->users->set_msg_status($msgid);
		$newmsg = $this->users->newmsg();
		$this->session->set_userdata('newmsg', count($newmsg) );
		$receiver = $this->users->find( $rec );
		$this->load->view('admin/include/header');
		$this->load->view('admin/messages/message_new',compact('users','receiver'));
		$this->load->view('admin/include/footer');
		
	}
	public function message_delete($id)
	{
		return $this->_falshAndRedirect(
					$this->users->deletemessage($id),
					"Message Deleted Successully.",
					"Message Failed To Delete, Please Try Again.",
					"admin/messages"
				);
	}
	private function _falshAndRedirect( $successful, $successMessage, $failureMessage ,$url )
	{
		if( $successful ) {
			$this->session->set_flashdata('feedback',$successMessage);
			$this->session->set_flashdata('feedback_class', 'alert-success');
		} else {
			$this->session->set_flashdata('feedback', $failureMessage);
			$this->session->set_flashdata('feedback_class', 'alert-danger');
		}
		return redirect($url);
	}
	public function send_mail()
	{
		$this->load->file('PHPMailer/PHPMailerAutoload.php');
	 $number_of_files_uploaded = count($_FILES['files']['name']);

					$email=$_POST["to"];	
					$emaill = explode(",",$email);
					
					$subject=$_POST["subject"];
					$description=$_POST['message'];
					$message = "Message : $description <br>";
					
					$mail = new PHPMailer;
					 
					$mail->isSMTP();                            // Set mailer to use SMTP
				$mail->Host = gethostbyname('ssl://smtp.gmail.com');           // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                     // Enable SMTP authentication
				$mail->Username = 'rajan.humrobo@gmail.com';          // SMTP username
				$mail->Password = 'rajan@123'; // SMTP password
				//$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;                          // TCP port to connect to

				$mail->setFrom('lockhart@lockdownprotection.com','Lock');
				//$mail->addAddress('rajan.humrobo@gmail.com','Admin');   // Add a recipient
				$mail->isHTML(true);
				for ($i = 0; $i < $number_of_files_uploaded; $i++) :
					$f_name[$i] =  $_FILES['userfile']['name']     = $_FILES['files']['name'][$i];
					/*   $_FILES['userfile']['type']     = $_FILES['files']['type'][$i]; */
					$f_path[$i] = $_FILES['userfile']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					/*   $_FILES['userfile']['error']    = $_FILES['files']['error'][$i];
					  $_FILES['userfile']['size']     = $_FILES['files']['size'][$i]; */
					$mail2->addAttachment($f_path[$i],$f_name[$i]);    
				endfor;
				$mail->Subject = $subject ;
				foreach($emaill as $addr)
				{
				$mail->addAddress($addr);
				}
				$mail->Body    = $message;
					if(!$mail->send()) {
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				}
					// mail($to,$subject,$message,'','');
				

				// keeps the current $mail settings and creates new object
			/* 	$mail2 =  new PHPMailer;
					$mail2->isSMTP();                            // Set mailer to use SMTP
				$mail2->Host = gethostbyname('ssl://smtp.gmail.com');           // Specify main and backup SMTP servers
				$mail2->SMTPAuth = true;                     // Enable SMTP authentication
				$mail2->Username = 'rajan.humrobo@gmail.com';          // SMTP username
				$mail2->Password = 'rajan@123'; // SMTP password
				//$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
				$mail2->Port = 465;                          // TCP port to connect to
				$mail2->setFrom('lockhart@lockdownprotection.com','Lock');
				$mail2->isHTML(true);
				
				$mail2->Subject = "Request Recieved";
				// now send to user.
				$mail2->addAddress('rajan.humrobo@gmail.com','Admin');
				$mail2->Body = "Thank you for your inquiry, we will contact you in 24 hours";

				if(!$mail2->Send()) {
					echo "Mailer Error: " . $mail2->ErrorInfo;
					exit;
				}  */
				else{
				return $this->_falshAndRedirect(
					$mail2->Send(),
					"Email Send Successully.",
					"Email Failed To Send, Please Try Again.",
					"admin/users"
				);
				}
	}
	public function send_message()
	{
		$message = $this->input->get('message');
		$sender_id = $this->input->get('sender_id');
		$groupp = $this->input->get('groupp');
		$sendername = $this->input->get('sendername');
		$receiver_id = $this->input->get('receiver_id');
		$receivername = $this->input->get('receivername');
		
		$this->users->add_message($message, $sender_id, $groupp ,$sendername,$receiver_id,$receivername);
		
		$this->_setOutput($message);
	}
	
	
	public function get_messages()
	{
		$sender_id = $this->input->get('sender_id');
		$receiver_id = $this->input->get('receiver_id');
		$messages = $this->users->get_messages($sender_id,$receiver_id);
		$this->_setOutput($messages);
	}
	
	
	private function _setOutput($data)
	{
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		
		echo json_encode($data);
	}
	public function restricted_access()
	{
		
			$this->load->view('admin/include/header_login');
			$this->load->view('admin/restricted_access');

		
	}
	public function update_role($id)
	{
		$post = $this->input->post();
			unset($post['submit']);
			return $this->_falshAndRedirect(
					$this->users->update_role($id,$post),
					"Role Updated Successully.",
					"Role Failed To Update, Please Try Again.",
					"admin/roles"
				);
	}
}