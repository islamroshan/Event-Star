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
        //CHECKING THE VALIDATION
        $this->form_validation->set_rules('eventname','Event Name','trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$data['main_view'] = 'event/add_event';
            $this->load->view('layouts/main',$data);

        }
        else 
        {	
            $events = $this->input->post();
            $query = $this->event_model->add_event($events);
            if($query)
            {
                $this->session->set_flashdata('event_created','Event Had Been Added');
                redirect('event/add_event_controller');
            }
            else
            {
                $this->session->set_flashdata('event_not_created','Event Had Not Been Added');
                redirect('event/add_event_controller');
            }
        }
    }
}
