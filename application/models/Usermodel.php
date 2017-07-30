<?php
class Usermodel extends CI_Model
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
		$q = $this->db->from('uploads')
				->where( ['user_id' => $id] )
				->get();
		if ( $q->num_rows() )
			return $q->result();
		return false;
	}
	
}