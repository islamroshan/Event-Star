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
            $this->session->set_flashdata('ticket_added','Ticket Has Been Added');
            redirect('ticket/add_ticket_controller');
        }
        else
        {
            $this->session->set_flashdata('ticket_not_added','Ticket Has Not Been Added');
            redirect('ticket/add_ticket_controller');
        }
    }
}
