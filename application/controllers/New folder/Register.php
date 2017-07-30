<?php

class Register extends CI_Controller
{	
	public function __construct()
        {
                parent::__construct();
               $this->load->helper('url');
				$this->load->helper('form');
        }

	public function index()
	{	
		$this->load->view('home');
	}
	
	public function check()
	{
		if($_POST['submit']=="Login")
		{
			$this->load->view('login');
		}
		elseif ($_POST['submit']=="Register")
		{
			$this->load->view('register');
		}
	}
	
	public function register()
	{
		$this->load->view('register');
	}
	public function insert()
	{	
		unset($_POST['submit']);
		$data=array( 
			'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'address' => $this->input->post('address'),
			
          );
		$this->load->model('register_model'); 
		$this->register_model->insert($data);
		
	}
	
	public function edit()
	{
		$id = $this->uri->segment(3);
		$this->load->model('register_model'); 
		$result = $this->register_model->edit_record($id);
		$data['result'] = $result;
        $this->load->view('edit', array('data' => $data));
		
	}
	public function update()
	{
			//print_r($_POST);
			$this->load->model('register_model'); 
		$this->register_model->update($_POST);
	}
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('register_model'); 
		$result = $this->register_model->delete($id);
		redirect('register');
	}
}
?>