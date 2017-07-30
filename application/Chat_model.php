<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {  
  
	function add_message($message,$sender_id,$group)
	{
		$data = array(
			'message'	=> (string) $message,
			'sender_id'		=> $sender_id,
			'receiver_id' =>'admin',
			'groupp'		=> $group,
			);
		  
		$this->db->insert('messages_new', $data);
	}

	function get_messages($sender_id)
	{
		$receiver_id = 'admin';
		$this->db->select('*');
		$where = '(sender_id='.$sender_id.' or receiver_id = '.$sender_id.')';
                $where1 = "(receiver_id='admin' or sender_id = 'admin')";
                 $this->db->where($where);
                 $this->db->where($where1);
		
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get('messages_new');
		 $list=$query->result_array();
		 
		 foreach($list as $key=> $le){
			 
			$query = $this->db->query("SELECT * FROM users where id = $sender_id;");
				$result = $query->result();
				
				$list[$key]['userdata'] = $result; 
			  }
			  return $list;
	}

}