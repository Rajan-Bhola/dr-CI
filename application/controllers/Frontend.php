<?php 
class Frontend extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Frontendmodel','front');
		
 
	}
	public function index()
	{
		if( $this->session->userdata('user_id') )
		return redirect('frontend/welcome');
		$this->load->view('frontend/include/header_once');
		$this->load->view('frontend/welcome');
		$this->load->view('frontend/include/footer');
	}
	public function login()
	{
		if( $this->session->userdata('user_id') )
			return redirect('admin/dashboard');
		$this->load->view('frontend/include/header_once');
		$this->load->view('frontend/login');
		$this->load->view('frontend/include/footer');
	}
	public function login_validate()
	{
		if( $this->session->userdata('user_id') )
			return redirect('admin/dashboard');
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$login_id = $this->front->login_valid($username, $password);
		if( $login_id )
			{		
				$this->session->set_userdata('user_id', $login_id );
				return redirect('frontend/welcome');
			} else
			{
				$this->session->set_flashdata('login_failed','Invalid Username/Password.');
				return redirect('frontend/login');
			}
	}	
	public function register()
	{
		$this->load->view('frontend/include/header_once');
		$this->load->view('frontend/register');
		$this->load->view('frontend/include/footer');
	}
	public function welcome()
	{
	$users = $this->front->find($this->session->userdata('user_id'));

	$newmsg = $this->front->newmsg();
	$this->session->set_userdata('newmsg', count($newmsg) );
	$this->load->view('frontend/include/header',compact('users'));
	$this->load->view('frontend/welcome');
	$this->load->view('frontend/include/footer');
	}
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('newmsg');
		return redirect('frontend');
	}
	public function adduser()
	{
		if( $this->form_validation->run('add_user_rules_front'))
		{
			$post = $this->input->post();
			unset($post['submit']);
			$data = $this->front->addnewuser($post);
			return $this->_falshAndRedirect(
						$data,
						"Signup Successully.",
						"Failed To Signup, Please Try Again.",
						"frontend"
					);
		}
		 else {
				$upload_error = $this->upload->display_errors();
				$this->load->view('frontend/include/header_once');
				$this->load->view('frontend/register',compact('upload_error'));
				$this->load->view('frontend/include/footer');

		}
	}
	public function gallery($id)
	{
		$users = $this->front->find($this->session->userdata('user_id'));
		$created_at = $this->front->find_uploads( $id );
		$this->load->view('frontend/include/header',compact('users'));
		$this->load->view('frontend/gallery',compact('created_at'));
		$this->load->view('frontend/include/footer');
	}
		public function gallery_view()
	{

		$user_id = $this->uri->segment(3);
		$date = $this->uri->segment(4);
		$users = $this->front->find($this->session->userdata('user_id'));
	
		$created_at = $this->front->gallery_view($user_id, $date );
		$this->load->view('frontend/include/header',compact('users'));
		$this->load->view('frontend/gallery_view',compact('created_at'));
		$this->load->view('frontend/include/footer');
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
	public function profile($id)
	{
		$users = $this->front->find( $id );
		$this->load->view('frontend/include/header',compact('users') );
		$this->load->view('frontend/profile', compact('users') );
		$this->load->view('frontend/include/footer');

	}
	public function settings($id)
	{
		$users = $this->front->find( $id );
		$this->load->view('frontend/include/header',compact('users') );
		$this->load->view('frontend/settings', compact('users') );
		$this->load->view('frontend/include/footer');

	}
	public function update_account()
	{
		$this->front->update_account($_POST['id'],$_POST);
		$users = $this->front->find( $_POST['id'] );
		$this->load->view('frontend/include/header',compact('users') );
		$this->load->view('frontend/settings', compact('users') );
		$this->load->view('frontend/include/footer');

	}
	public function update_profile()
	{
		$this->front->update_profile($_POST['id'],$_POST);
		$users = $this->front->find( $_POST['id'] );
		$this->load->view('frontend/include/header',compact('users') );
		$this->load->view('frontend/settings', compact('users') );
		$this->load->view('frontend/include/footer');

	}
	public function update_password()
	{
	
		$this->front->update_password($_POST['id'],$_POST);
		$users = $this->front->find( $_POST['id'] );
		$this->load->view('frontend/include/header',compact('users') );
		$this->load->view('frontend/settings', compact('users') );
		$this->load->view('frontend/include/footer'); 

	}
	public function messages()
	{
		//$newmsg = $this->front->newmsg();
		//$this->session->unset_userdata('newmsg');
		$config = [
			'base_url'			=>	base_url('frontend/messages'),
			'per_page'			=>	5,
			'total_rows'		=>	$this->front->message_num_rows(),
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
		$datas = $this->front->message_list( $config['per_page'], $this->uri->segment(3) );
		$new = $this->front->new_message_list( $config['per_page'], $this->uri->segment(3) );
		$users = $this->front->find($this->session->userdata('user_id') );
		$this->load->view('frontend/include/header',compact('users') );
		$this->load->view('frontend/allmessages',compact('datas','new'));
		$this->load->view('frontend/include/footer'); 
	}
	public function view_message()
	{
		$rec = $this->input->get('sender_id');
		$msgid = $this->input->get('message_id');
		
		$users = $this->front->find($this->session->userdata('user_id') );
		
		 $this->front->set_msg_status($msgid);
		$datas = $this->front->find($this->session->userdata('user_id') );
		$receiver = $this->front->find( $rec );
		$newmsg = $this->front->newmsg();
		$this->session->set_userdata('newmsg', count($newmsg) );
		$this->load->view('frontend/include/header',compact('users') );
		$this->load->view('frontend/message_new',compact('datas','receiver'));
		$this->load->view('frontend/include/footer'); 
	}
	
	public function send_message()
	{
		$message = $this->input->get('message');
		$sender_id = $this->input->get('sender_id');
		$groupp = $this->input->get('groupp');
		$sendername = $this->input->get('sendername');
		$receiver_id = $this->input->get('receiver_id');
		$receivername = $this->input->get('receivername');
		
		$this->front->add_message($message, $sender_id, $groupp ,$sendername,$receiver_id,$receivername);
		
		$this->_setOutput($message);
	}
	
	
	public function get_messages()
	{
		$sender_id = $this->input->get('sender_id');
		$receiver_id = $this->input->get('receiver_id');
		$messages = $this->front->get_messages($sender_id,$receiver_id);
		$this->_setOutput($messages);
	}
	
	
	private function _setOutput($data)
	{
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		
		echo json_encode($data);
	}
	public function addnewmessage()
	{
		$users = $this->front->find( $this->session->userdata('user_id') );
		$roles = $this->front->roles();
		$this->load->view('frontend/include/header',compact('users') );
		$this->load->view('frontend/addnewmessage',compact('roles','users'));
		$this->load->view('frontend/include/footer'); 
	}
	
}
