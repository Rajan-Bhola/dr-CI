<?php
class Adminmodel extends CI_Model
{
	public function login_valid( $username, $password )
	{
		$q = $this->db->where(['username'=>$username,'password'=>$password])
						->get('users');
		if ( $q->num_rows() ) {
			return $q->row()->id;
		} else {
			return FALSE;
		}
	}
	public function addnewuser($post)
	{
		if(!empty($post['username']))
		{
			return $this->db->insert( 'users', $post );
		}
		else
		{
			return;
		}
	}
	public function userroles($role)
	{
		$q = $this->db->from('roles')
				->where( ['name' => $role] )
				->get();
		return $q->row();
	}
	public function addnewrole($post)
	{
		if(!empty($post['name']))
		{
			return $this->db->insert( 'roles', $post );
		}
		else
		{
			return false;
		}
	}
	public function roles( )
	{
		$query = $this->db
							->select(['*'])
							->from('roles')
							->get();
		return $query->result();
	}
	public function users($status)
	{
		$query = $this->db
							->select(['*'])
							->from('users')
							->where( ['status' => $status] )
							->get();
						
		return $query->num_rows();
	}
	public function message_list( $limit, $offset )
	{
		$query = $this->db
							->select(['*'])
							->from('messages_new')
							->where(['sender_id'=>$this->session->userdata('user_id')])
							->or_where(['groupp','all'])
							->limit( $limit, $offset )
							->get();
						
		return $query->result();
	}
	public function new_message_list( $limit, $offset )
	{
		$id = $this->session->userdata('user_id');
		 $where1 = "( status=0 and sender_id = '$id' )";
		$query = $this->db
							->select(['*'])
							->from('messages_new')
							->where($where1)
							//->or_where(['groupp','all'])
							->limit( $limit, $offset )
							->get();
			
		return $query->result();
	}
	public function users_list( $limit, $offset )
	{
		$query = $this->db
							->select(['*'])
							->from('users')
							->limit( $limit, $offset )
							->get();
						
		return $query->result();
	}
	public function admin_users_list( $limit, $offset,$name )
	{
		$query = $this->db
							->select(['*'])
							->from('users')
							->where( ['role' => $name] )
							->limit( $limit, $offset )
							->get();
						
		return $query->result();
	}
	
	public function num_rows()
	{
		$query = $this->db
							->select(['*'])
							->from('users')
							->get();
							
		return $query->num_rows();
	}
	public function message_num_rows()
	{
		$query = $this->db
							->select(['*'])
							->from('messages_new')
							->get();
							
		return $query->num_rows();
	}
	public function roles_num_rows($role)
	{
		$query = $this->db
							->select(['*'])
							->from('users')
							->where( ['role' => $role] )
							->get();
							
		return $query->num_rows();
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
	public function message_sent( $id )
	{
		$q = $this->db->from('messages')
				->where( ['from_id' => $id] )
				->order_by("created_at", "asc")
				->get();
		return $q->result();
	}
	public function message_recieve( $id )
	{
		$q = $this->db->from('messages')
				->where( ['user_id' => $id] )
				->order_by("created_at", "asc")
				->get();
		return $q->result();
	}
	public function role_find( $id )
	{
		$q = $this->db->from('roles')
				->where( ['id' => $id] )
				->get();
		if ( $q->num_rows() )
			return $q->row();
		return false;
	}
	public function updateuser($user_id, Array $users)
	{
		
		return $this->db
				->where('id', $user_id)
				->update('users', $users);
	}
	public function deleteuser($id)
	{
		return $this->db->delete('users',['id'=>$id]);
	}
	public function deletemessage($id)
	{
		return $this->db->delete('messages_new',['id'=>$id]);
	}
	public function deleterole($id)
	{
		return $this->db->delete('roles',['id'=>$id]);
	}
	public function admin_count($name )
	{
		$q = $this->db->from('users')
				->where( ['role' => $name] )
				->get();
		return $q->num_rows();
	}
	public function user_count( )
	{
		$q = $this->db->from('users')
				->where( ['role' => 'User'] )
				->get();
		return $q->num_rows();
	}
	public function upload_file($post)
	{
	 return $this->db->insert( 'uploads', $post );
	
	}
	public function find_uploads( $id )
	{
		$q = $this->db->select('created_at,user_id')
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
	function search($search)
	{
		 $this->db->select("*");
		 $whereCondition = "username='$search'";
		 //$whereCondition = array('LAST_NAME' =>$search);
		 $this->db->where($whereCondition);
		 $this->db->from('users');
		 $query = $this->db->get();
		 return $query->result();
	}
	public function addnewmessage($post)
	{
		if(!empty($post['message']))
		{
			return $this->db->insert( 'messages_new', $post );
		}
		else
		{
			return false;
		}
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
	public function set_msg_status($msgid)
	{
		return $this->db
				->where('id', $msgid)
				->update('messages_new', ['status'=>1]);
	}
	public function newmsg()
	{
		$user_id = $this->session->userdata('user_id');
		$whereCondition = "status= 0 AND receiver_id='$user_id'  ";
			 	 $this->db->select("*");
			 $this->db->where($whereCondition);
				 $this->db->from('messages_new');
				$query = $this->db->get();
				return $query->result(); 
				
	}
	public function update_role($id,$post)
	{
		return $this->db
				->where('id', $id)
				->update('roles', $post);
	}
	public function dashboard_users_list(  )
	{
		$query = $this->db
							->select(['*'])
							->from('users')
							->order_by('created_at', 'DESC')
							->limit( 2 )
							->get();
					
		return array_reverse($query->result());
	}
}