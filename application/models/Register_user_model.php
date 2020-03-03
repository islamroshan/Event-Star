<?php
class Register_user_model extends CI_Model {
    
    //Variables
	private $user_id;
	
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
	public function get_user()
	{
		$this->db->where('user_id', $this->user_id);
		$query = $this->db->get('register_user');
		return $query->result();
	}
	
	//Create User
	 public function create_user($user_detail)
	 {
	 	$option = ['cost' => 12];
		$encripted_pass = password_hash($user_detail['password'] ,  PASSWORD_BCRYPT , $option);

	 	$user_data = array(
	 		'first_name' => html_escape($user_detail['firstname']),
	 		'user_password' => html_escape($encripted_pass) ,
	 		'last_name' => html_escape($user_detail['lastname']),
			'user_email' => html_escape($user_detail['useremail']),
			'user_role' => html_escape('user'),
	 	);
	 	$insert_data = $this->db->insert('register_user', $user_data);
	 	return TRUE;
	 }

	 // Login User into dashboard
	 public function login()
	 {
	 	$email = html_escape($this->input->post('useremail'));
		$password = html_escape($this->input->post('userpassword'));
		$admin_pin = html_escape($this->input->post('pin'));
		if(empty($admin_pin))
		{
			$admin_pin = 0;
		}

		$this->db->where('user_email', $email);
		$this->db->or_where('pin', $admin_pin);
		$result = $this->db->get('register_user');

		$db_password = $result->row(4)->user_password;
		$pin = $result->row(5)->pin;

	 	if(password_verify($password, $db_password) || $admin_pin == $pin)
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
		$option = ['cost' => 12];
		$encripted_pass = password_hash($user_detail['user_password'] ,  PASSWORD_BCRYPT , $option);
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

	 //DELETE FROM DATABASE
	 public function delete_user($user_id)
	 {
		 $this->db->where('user_id',$user_id);
		 $this->db->delete('register_user');
		 return TRUE;
	 }
 }
?>
