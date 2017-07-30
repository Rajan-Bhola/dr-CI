<?php

	class Register_model extends CI_Model {
	
		 public function insert($data)
        {	
			
			
                $this->username    = $data['username']; 
                $this->password  = $data['password'];
                $this->address  = $data['address'];
                
				
               $success = $this->db->insert('Register', $this);  
			   if(isset($success))
			   {
				echo "Inserted Successfully";
			   }
			
				
        }
		public function edit_record($id)
		{
			$query = $this->db->query("SELECT * FROM register where sr_no = $id;");
				$result = $query->result();
				return $result;
		}
		public function update($data)
		{
			//print_r($data);
			 $this->db->where('sr_no', $data['sr_no']);
			$this->db->update('register	', $data);
			/* $query = $this->db->query("UPDATE register SET 'username' = $data['username'],'address' = $data['address'] where 'sr_no' = $data['sr_no'];");
			$result = $query->result(); */
			echo "Record updated"; 	
		}
		public function delete($id)
		{
			  $this->db->where('sr_no', $id);
				$this->db->delete('register');
				echo "recored deleted";
		}
        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

}