<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_guest_controller extends CI_Controller {

    //Initialize page
	public function index()
	{
        $data['tickets'] = $this->ticket_model->get_all_tickets();
        $data['currency'] = $this->setting_model->get_currency();
        $data['events'] = $this->event_model->get_all_events();
        $data['main_view'] = 'guest/add_guest';
        $this->load->view('layouts/main',$data);
    }

    //Add Event
    public function add_guest()
    {
        $guests = $this->input->post();
        $query = $this->guest_model->add_guest($guests);
        if($query)
        {
            $this->session->set_flashdata('guest_added','Guest Has Been Added');
            redirect('guest/add_guest_controller');
        }
        else
        {
            $this->session->set_flashdata('guest_not_added','Guest Has Not  Been Added');
            redirect('dashboard_controller');
        }
    }
}
