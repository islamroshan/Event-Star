<?php
class Edit_profile_model extends CI_Model {   
	
    //To Get User
	public function get_user($user_id)
	{
		$this->db->where('user_id' , $user_id);
		$query = $this->db->get('register_user');
		return $query->result();
	}
	
	//To Update Profile
	public function update_profile($user_id,$user_data)
	{
        $pass = $user_data['password'];
		$option = ['cost' => 12];
        $encripted_pass =password_hash($pass ,  PASSWORD_BCRYPT , $option);
         
         $data = array(
            'first_name' => html_escape($user_data['firstname']),
            'last_name' => html_escape($user_data['lastname']),
            'user_email' => html_escape($user_data['useremail']),
			'user_password' => html_escape($encripted_pass),
			'pin' => html_escape($user_data['pin'])
        );
		$this->db->where('user_id' , $user_id);
		$this->db->update('register_user',$data);
		return TRUE;
	}
	
}
?>