<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_controller extends CI_Controller {
    
    //Display Settings Form
	public function index()
	{	
		$data['ems_settings'] = $this->setting_model->get_settings();
		$data['main_view'] = "settings/settings";
		$this->load->view('layouts/main', $data);
	}
    
    //To Update Brand Name
	public function update_company()
	{
		$ems_details = $this->input->post();
		$this->setting_model->update_company($ems_details);
		if($this->setting_model->update_company($ems_details))
		{
			$this->session->set_flashdata('settings_updated','Your Settings Has Been Updated Succesfully');
			redirect('settings/settings_controller');
		}
	}
    
    //To Update Logo
	public function update_logo()
	{
		$config['upload_path']          = './image/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1024;
		$config['max_width']            = 460;
		$config['max_height']           = 275;

		$this->load->library('upload', $config);
		 
		if ( ! $this->upload->do_upload('companylogo'))
		{
    		$data = array('error' => $this->upload->display_errors());
    		$data['ems_settings'] = $this->setting_model->get_settings();
    		$data['main_view'] = "settings/settings";
    		$this->load->view('layouts/main', $data);
		}
		else
		{
    		$data = $this->upload->data();
    		$image_path = $data['raw_name'].$data['file_ext'];
    		if($this->setting_model->update_logo($image_path))
    		{
				$this->session->set_flashdata('logo_updated','Your Logo Has Been Uploaded Succesfully');
				redirect('settings/settings_controller');
    		}
		}	 
	}
  }
?>