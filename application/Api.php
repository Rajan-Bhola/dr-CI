<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Chat_model');
	}
	
	
	public function send_message()
	{
		$message = $this->input->get('message', null);
		
		$sender_id = $this->input->get('sender_id', '');
		
		$group = $this->input->get('group', '');
		
		$this->Chat_model->add_message($message,$sender_id,$group);
		
		$this->_setOutput($message);
	}
	
	
	public function get_messages()
	{
		
		$sender_id = $this->input->get('sender_id');
		$messages = $this->Chat_model->get_messages($sender_id);
		$this->_setOutput($messages);
	}
	
	
	private function _setOutput($data)
	{
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		
		echo json_encode($data);
	}
}