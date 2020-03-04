<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_user_controller extends CI_Controller {
    
    //GET TICKET INFO
    public function get_user_info($user_id)
    {
        $data['user_info'] = $this->register_user_model->get_user_by_id($user_id);
        $data['main_view'] = 'user/edit_user';
        $this->load->view('layouts/main',$data);
    }

    //UDATE USER
    public function update_user($user_id)
    {
        //CHECKING THE VALIDATION
        $this->form_validation->set_rules('first_name','Event Name','trim|required');
        $this->form_validation->set_rules('user_email','Event Name','trim|required');
        $this->form_validation->set_rules('user_password','Event Name','trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$data['user_info'] = $this->register_user_model->get_user_by_id($user_id);
            $data['main_view'] = 'user/edit_user';
            $this->load->view('layouts/main',$data);
        }
        else
        {
            $user_detail = $this->input->post();
            $query = $this->register_user_model->update_user($user_detail, $user_id);
            if($query)
            {
                $this->session->set_flashdata('user_updated','User Has Been Updated');
                redirect('user/user_list_controller');
            }
            else
            {
                redirect('dashboard_controller');
            }
        }
    }

    //DELETE FROM DATABASE
    public function delete_user($user_id)
    {
        if($this->register_user_model->delete_user($user_id))
        {
            redirect('user/user_list_controller');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }
    
}
