<?php
class FrontendModel extends CI_Model
{
	public function login_valid( $username, $password )
	{
		$q = $this->db->where(['email'=>$username,'password'=>$password])
						->get('users');
		if ( $q->num_rows() ) {
			return $q->row()->id;
		} else {
			return FALSE;
		}
	}
	public function find( $id )
	{
		$q = $this->db->from('users')
				->where( ['id' => $id] )
				->get();
		if ( $q->num_rows() )
			return $q->row();
		return false;
	}
	public function addnewuser($post)
	{
		$post['role']='User';
		if(!empty($post['username']))
		{
			return $this->db->insert( 'users', $post );
		}
		else
		{
			return;
		}
	}
		public function find_uploads( $id )
	{
		$q = $this->db->select('created_at,user_id,id')
				->from('uploads')
				->where( ['user_id' => $id] )
				->group_by('created_at')
				->order_by('created_at', 'desc')
				->get();
		if ( $q->num_rows() )
				return $q->result();
		return false;
	}
	public function gallery_view( $user_id,$date )
	{
		$q = $this->db->select('*')
				->from('uploads')
				->where( ['user_id' => $user_id ,'created_at'=> $date] )
				->get();
		if ( $q->num_rows() )
				return $q->result();
		return false;
	}
	public function update_account($user_id, Array $users)
	{
		
		return $this->db
				->where('id', $user_id)
				->update('users', $users);
				
	}
	public function update_profile($user_id, Array $users)
	{
		
		return $this->db
				->where('id', $user_id)
				->update('users', $users);
				
	}
	public function update_password($user_id, Array $users)
	{
		
		return $this->db
				->where('id', $user_id)
				->update('users', $users);
				
	}
	public function newmsg()
	{
		$user_id = $this->session->userdata('user_id');
		$whereCondition = "status= 0 AND receiver_id='$user_id' OR groupp='all' ";
			 	 $this->db->select("*");
			 $this->db->where($whereCondition);
				 $this->db->from('messages_new');
				$query = $this->db->get();
				return $query->result(); 
				
	}
	public function message_num_rows()
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db
							->select(['*'])
							->from('messages_new')
							->where('receiver_id',$user_id)
							->get();
							
		return $query->num_rows();
	}
	public function message_list( $limit, $offset )
	{
		
/* 		$user_id = $this->session->userdata('user_id');
		$whereCondition = "status= 0 AND user_id='$user_id' OR group='all' ";
			 	 $this->db->select("*");
			 $this->db->where($whereCondition);
				 $this->db->from('messages');
				 $this->db->limit( $limit, $offset )
				$query = $this->db->get();
				return $query->result(); 
				 */
		$user_id = $this->session->userdata('user_id');
		/* if($this->session->userdata('newmsg'))
		{ */
		/*$whereCondition = "status= 0 AND receiver_id='$user_id' OR groupp='all' ";
		$query = $this->db
							->select(['*'])
							->from('messages_new')
							->where($whereCondition)
							->limit( $limit, $offset )
							->get();
		/* }
		else{ */
		$whereCondition = "receiver_id='$user_id' OR groupp='all' ";
			$query = $this->db
							->select(['*'])
							->from('messages_new')
							->where($whereCondition)
							->limit( $limit, $offset )
							->get();
		
		
						
		return $query->result();
	}
	public function new_message_list( $limit, $offset )
	{
		$id = $this->session->userdata('user_id');
		 $where1 = "(status=0 and receiver_id = '$id' or groupp='all')";
		$query = $this->db
							->select(['*'])
							->from('messages_new')
							->where($where1)
							->limit( $limit, $offset )
							->get();
		
		return $query->result();
	}
	public function set_msg_status( $id )
	{
		$status = array('status' => 1);    
		return $this->db
				->where('id', $id)
				->update('messages_new', $status);
	}
	public function message_find( $id )
	{
		$q = $this->db->from('messages_new')
				->where( ['id' => $id] )
				->get();
		if ( $q->num_rows() )
			return $q->row();
		return false;
	}
	function add_message($message, $sender_id, $groupp ,$sendername,$receiver_id,$receivername)
	{
		$data = array(
			'message'	=> $message,
			'sender_id'	=> $sender_id,
			'groupp'	=> $groupp,
			'sendername'	=> $sendername,
			'receiver_id'	=> $receiver_id,
			'receivername'	=> $receivername
		);
		 
		$this->db->insert('messages_new', $data);
	}

	function get_messages($sender_id,$receiver_id)
	{
		$this->db->select('*');
		$where = '(sender_id='.$sender_id.' or receiver_id = '.$sender_id.')';
                $where1 = "(receiver_id=$receiver_id or sender_id = $receiver_id)";
                 $this->db->where($where);
                 $this->db->where($where1);
		
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get('messages_new');
		
		return array_reverse($query->result_array());
	}
	public function roles( )
	{
		$query = $this->db
							->select(['*'])
							->from('roles')
							->get();
		return $query->result();
	}

}