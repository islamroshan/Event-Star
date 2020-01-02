<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_guest_controller extends CI_Controller {

    //Initialize page
	public function index()
	{
        $data['tickets'] = $this->ticket_model->get_all_tickets();
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
            redirect('guest/add_guest_controller');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }
}
