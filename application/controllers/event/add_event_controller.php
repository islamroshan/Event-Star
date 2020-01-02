<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_event_controller extends CI_Controller {

    //Initialize page
	public function index()
	{
        $data['main_view'] = 'event/add_event';
        $this->load->view('layouts/main',$data);
    }

    //Add Event
    public function add_event()
    {
        $events = $this->input->post();
        $query = $this->event_model->add_event($events);
        if($query)
        {
            redirect('Add_event_controller');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }
}
