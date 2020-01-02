<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_ticket_controller extends CI_Controller {

    //Initailize Page
	public function index()
	{
        $data['events'] = $this->event_model->get_all_events();
        $data['main_view'] = 'ticket/add_ticket';
        $this->load->view('layouts/main',$data);
    }

    //Add ticket
    public function add_ticket()
    {
        $ticket = $this->input->post();
        $query = $this->ticket_model->add_ticket($ticket);
        if($query)
        {
            redirect('ticket/add_ticket_controller');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }
}
