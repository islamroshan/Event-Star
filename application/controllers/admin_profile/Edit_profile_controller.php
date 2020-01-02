<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_profile_controller extends CI_Controller {
    
    //Display Edit Profile Form
	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['user_detail'] = $this->edit_profile_model->get_user($user_id);
		$data['main_view'] = "admin_profile/edit_profile";
		$this->load->view('layouts/main', $data);
	}
	
	//To Update Profile
	public function update_profile()
	{
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
		
		if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors()
			);
			$user_id = $this->session->userdata('user_id');
			$data['user_detail'] = $this->edit_profile_model->get_user($user_id);
			$data['main_view'] = "admin_profile/edit_profile";
			$this->load->view('layouts/main', $data);
		}
		else 
		{	
            $user_id = $this->session->userdata('user_id');
            $user_data = $this->input->post();
			if($this->edit_profile_model->update_profile($user_id,$user_data))
			{
				redirect('login_controller');
			}
		}
	}
}
		