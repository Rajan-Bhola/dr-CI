<?php 
class Users extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('adminmodel','users');
		$this->load->helper('form');
	}
	public function index($id)
	{
			
		$users = $this->users->find( $id );
		$this->load->view('admin/include/header');
		$this->load->view('admin/users/profile', compact('users') );
		$this->load->view('admin/include/footer');

	}
	
	public function adduser()
	{
		
	
		if( $this->form_validation->run('add_user_rules'))
		{
			$post = $this->input->post();
			unset($post['submit']);
			unset($post['pass2']);
			$data = $this->users->addnewuser($post);
			return $this->_falshAndRedirect(
						$data,
						"User Added Successully.",
						"Failed To Add User, Please Try Again.",
						"admin/users"
					);
		}
		 else {
			$upload_error = $this->upload->display_errors();
				$this->load->view('admin/include/header');
				$this->load->view('admin/users/addnewuser',compact('upload_error'));
				$this->load->view('admin/include/footer');

		}
	}
	public function edituser($id)
	{
		$roles = $this->users->roles();
		$users = $this->users->find( $id );
		$this->load->view('admin/include/header');
		$this->load->view('admin/users/edituser', compact('users','roles') );
		$this->load->view('admin/include/footer');

	}
	public function editrole($id)
	{
		$roles = $this->users->role_find( $id );
		$this->load->view('admin/include/header');
		$this->load->view('admin/users/editrole', compact('roles') );
		$this->load->view('admin/include/footer');

	}
	public function updateuser($id)
	{
		
		$users = $this->users->find( $id );
		if( $this->form_validation->run('add_user_rules'))
		{
			$post = $this->input->post();
			unset($post['submit']);
			unset($post['pass2']);
			$data = $this->users->updateuser($id,$post);
			return $this->_falshAndRedirect(
						$data,
						"User Updated Successully.",
						"Failed To Updated User, Please Try Again.",
						"admin/users"
					);
		}
		 else {
				$this->load->view('admin/include/header');
				$this->load->view('admin/users/edituser',compact('users'));
				$this->load->view('admin/include/footer');

		}
	}
	public function deleteuser($id)
	{
		return $this->_falshAndRedirect(
					$this->users->deleteuser($id),
					"Article Deleted Successully.",
					"Article Failed To Delete, Please Try Again.",
					"admin/users"
				);
	}
	public function deleterole($id)
	{
		return $this->_falshAndRedirect(
					$this->users->deleterole($id),
					"Role Deleted Successully.",
					"Role Failed To Delete, Please Try Again.",
					"admin/roles"
				);
	}
	public function addrole()
	{
		
		if( $this->form_validation->run('add_new_role'))
		{
			$post = $this->input->post();
			unset($post['submit']);
			$data = $this->users->addnewrole($post);
			return $this->_falshAndRedirect(
						$data,
						"Role Added Successully.",
						"Failed To Add Role, Please Try Again.",
						"admin/roles"
					);
		}
		else
		{
			$this->load->view('admin/include/header');
			$this->load->view('admin/users/roles');
			$this->load->view('admin/include/footer');
		}
	}
	public function upload($id)
	{
		$this->load->view('admin/include/header');
		$this->load->view('admin/users/upload_view',compact('id'));
		$this->load->view('admin/include/footer');
	}
	public function upload_file($id)
	{
		
	$users = $this->users->find( $id);
	$u_name = $users->username;
	$path = APPPATH.'../uploads/dcm/'.$u_name;
		if(!is_dir($path))
	{
		mkdir($path);
	}
	$path = APPPATH.'../uploads/dcm/'.$u_name.'/'.date('d-m-Y');
		if(!is_dir($path))
	{
		mkdir($path);
	}
		$this->load->file('dicom/class_dicom.php');
			  $this->load->library('upload');
    $number_of_files_uploaded = count($_FILES['files']['name']);
	
    // Faking upload calls to $_FILE
    for ($i = 0; $i < $number_of_files_uploaded; $i++) :
	
	  $_FILES['userfile']['name']     = $_FILES['files']['name'][$i];
      $_FILES['userfile']['type']     = $_FILES['files']['type'][$i];
      $_FILES['userfile']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
      $_FILES['userfile']['error']    = $_FILES['files']['error'][$i];
      $_FILES['userfile']['size']     = $_FILES['files']['size'][$i];
	  $tempp = explode(".", $_FILES["userfile"]["name"]);
	  $filename = rand() . '.' . end($tempp);
      $config = array(
        'file_name'     => $filename,
        'allowed_types' => 'jpg|jpeg|png|gif|dcm',
        'overwrite'     => FALSE,
        'upload_path'	=> $path
        //'upload_path'	=> $_SERVER['DOCUMENT_ROOT'].$path
		);
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload()) :
			$upload_error = $this->upload->display_errors();
			$this->load->view('admin/upload',compact('upload_error'));
      else :
	  
			$post['user_id'] = $id;
			$post['created_at'] = date('d-m-Y');
			unset($post['submit']);
			$image_path = base_url().'/uploads/dcm/'.$users->username.'/'.date('d-m-Y').'/'.$filename . '.jpg';
			$post['image_path'] = $image_path;
			$post['dcm'] = $filename;
			$post['jpg'] = $filename.'.jpg';
			
			
			$file = APPPATH . '../uploads/dcm/'.$users->username.'/' .date('d-m-Y').'/'.$filename;
			
				//$file = base_url("uploads/dcm/" .$post['dcm']);
				
				if(!$file) {
				  print "USAGE: ./dcm_to_jpg.php <FILE>\n";
				  exit;
				}

				if(!file_exists($file)) {
				  print "$file: does not exist\n";
				  exit;
				}

				$job_start = time();

				$d = new dicom_convert;
				$d->file = $file;
				$d->dcm_to_jpg();
				$d->dcm_to_tn();

				system("ls -lsh $file*");

				$job_end = time();
				$job_time = $job_end - $job_start;
				print "Created JPEG and thumbnail in $job_time seconds.\n";
		$temp = $this->users->upload_file($post);
		
      endif; 
    endfor;
		 return $this->_falshAndRedirect(
					$temp,
					"Files Uploaded Successully.",
					"Files Failed To Upload, Please Try Again.",
					"admin/users"
					); 
	}
	public function gallery($id)
	{
		$created_at = $this->users->find_uploads( $id );
		$this->load->view('admin/include/header');
		$this->load->view('admin/users/gallery',compact('created_at'));
		$this->load->view('admin/include/footer');
	}
	public function gallery_view()
	{
		$user_id = $this->uri->segment(3);
		$date =  $this->uri->segment(4);
		$created_at = $this->users->gallery_view($user_id, $date );
		$this->load->view('admin/include/header');
		$this->load->view('admin/users/gallery_view',compact('created_at'));
		$this->load->view('admin/include/footer');
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
}