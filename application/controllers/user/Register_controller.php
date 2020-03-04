<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_controller extends CI_Controller {
	 
	//Initialize page
	public function index()
	{
        $data['main_view'] = 'user/register_view';
        $this->load->view('layouts/main',$data);
	}

    //To Register New User 
	public function register_user()
	{	
		//CHECKING THE VALIDATION
		$this->form_validation->set_rules('firstname','first name','trim|required');
		$this->form_validation->set_rules('useremail','email','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$data['main_view'] = 'user/register_view';
			$this->load->view('layouts/main',$data);
		}
		else
		{
			$user_detail = $this->input->post();
			$query = $this->register_user_model->create_user($user_detail);
			if($query)
			{
				$this->session->set_flashdata('user_registered','User has been registered');
				redirect('user/register_controller');
			}
			else
			{
				$this->session->set_flashdata('not_registered','User has not been registered');
				redirect('user/register_controller');
			}
		}
	}
	
	// Login to dashboard
	public function login_user()
	{
		$user_id = $this->register_user_model->login();
		$this->register_user_model->set('user_id',$user_id);
		$data = $this->register_user_model->get_user();
		if(!empty($data))
		{
		    foreach ($data as $value) 
		    {
				$sess_data = array(
					'user_role'	   => $value->user_role,
					'username'     => $value->first_name,
					'pin' 		   => $value->pin
					);
				$this->session->set_userdata($sess_data);
	    	}
		}
		
		if($user_id)
		{
			$user_data = array(
				'user_id' => $user_id,
				'is_logged_in' => true,
			);
			$this->session->set_userdata($user_data);
			redirect('dashboard_controller');
		}
		else 
		{
		   redirect('user/register_controller/register_user');
		}
    }
    
    //To Logout
	 public function logout_user()
	 {
	 	$this->session->sess_destroy(); 
	 	redirect('');
	 }
}
