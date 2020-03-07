<?php
class Register_user_model extends CI_Model {
    
	//GETTER FUNCTION TO GET THE VAIRABLE
	public function get($name)
	{
	    return $this->$name;
	}

	//USED TO WRITE THE VALUE OF PROPERTY
	public function set($name, $value)
	{
	    $this->$name = $value;
	}
    
    // To Get users
	public function get_user($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('register_user');
		return $query->result();
	}
	
	//Create User
	 public function create_user($user_detail)
	 {
		$user_email = html_escape($user_detail['useremail']);

		//CHECKING IN DATABASE IF ANY USER WITH SAME EMAIL EXISTS.
		
		$check_email = $this->db->select('*');
		$check_email = $this->db->from('register_user');
		$check_email = $this->db->like('user_email', $user_email);
		$check_email=  $this->db->get();
		$result = $check_email->num_rows();
		if($result >= 1 )
		{
			return FALSE;
		}
		else
		{
			$option = ['cost' => 12];
			$encripted_pass = password_hash($user_detail['password'] , PASSWORD_BCRYPT , $option);

			$user_data = array(
				'first_name' => html_escape($user_detail['firstname']),
				'user_password' => html_escape($encripted_pass) ,
				'last_name' => html_escape($user_detail['lastname']),
				'user_email' => html_escape($user_email),
				'user_role' => html_escape('user'),
			);
			$insert_data = $this->db->insert('register_user', $user_data);
			return TRUE;
		}
	 }

	 // Login User into dashboard
	 public function login($login_details)
	 {
		$email = html_escape($login_details['useremail']);
		$password = html_escape($login_details['userpassword']);
		$admin_pin = html_escape($login_details['pin']);
		$db_password = '';
		$pin = '';
        
		if(empty($admin_pin)) { $admin_pin = 1; }

		if(!empty($email) && !empty($password))
		{
			$this->db->where('user_email', $email);
			$result = $this->db->get('register_user');
	
			$db_password = $result->row(4)->user_password;
		}
		else if(!empty($admin_pin))
		{
		    $this->db->where('user_role', 'admin');
			$result = $this->db->get('register_user');
	
			$pin = $result->row(5)->pin;
		}
		else
		{
			return FALSE;
		}

	 	if(password_verify($password, $db_password) || $admin_pin == $pin && $admin_pin != 0)
	 	{
	 		return $result->row(0)->user_id;
	 	} 
	 	else 
	 	{
	 		return FALSE;
	 	}
	 } 

	 //GET USER FROM DATABASE
	 public function get_users($limit,$start)
	 {
		$this->db->limit($limit,$start);
		$this->db->where('user_role !=', 'admin');
		$query = $this->db->get('register_user');
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return NULL;
		}
	}

	//TO COUNT NUMBER OF ROWS IN DATABASE	
    public function get_total_user_rows()
    {
        $this->db->select('*');
		$this->db->from('register_user');
		$this->db->where('user_role !=', 'admin');
        $query = $this->db->get();
        return $query->num_rows();
	}
	
	//TO SEARCH IN DATABASE
    public function search_tag($search_keyword)
    {
		$this->db->select('*');
        $this->db->from('register_user');
		$this->db->like('first_name',$search_keyword);
		$this->db->where('user_role !=', 'admin');
		$query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return NULL;
        }
	}
	
	//GET USER FORM DATABASE USING ID
    public function get_user_by_id($user_id)
    {
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('register_user');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return NULL;
        }
	}
	
	 //UPDATE USER
	 public function update_user($user_details,$user_id)
	 {
		$user_email = html_escape($user_details['user_email']);

		//CHECKING IN DATABASE IF ANY USER WITH SAME EMAIL EXISTS.
		
		$check_email = $this->db->select('*');
		$check_email = $this->db->from('register_user');
		$check_email = $this->db->like('user_email', $user_email);
		$check_email=  $this->db->get();
		$result = $check_email->num_rows();

		if($result >= 1 )
		{
			return FALSE;
		}
		else
		{
			$option = ['cost' => 12];
			$encripted_pass = password_hash($user_details['user_password'] ,  PASSWORD_BCRYPT , $option);
			 $data = array(
				 'first_name' => $user_details['first_name'],
				 'last_name' => $user_details['last_name'],
				 'user_email' => $user_details['user_email'],
				 'user_password' => $encripted_pass
			 );
			 $this->db->where('user_id',$user_id);
			 $this->db->update('register_user',$data);
			 return TRUE;
		}
	 }

	 //DELETE FROM DATABASE
	 public function delete_user($user_id)
	 {
		 $this->db->where('user_id',$user_id);
		 $this->db->delete('register_user');
		 return TRUE;
	 }
 }
?>
