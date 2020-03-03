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

    //ADD TICKET
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
    //ADD TICKET STOCK
    public function get_all_tickets()
    {
        $data['tickets'] = $this->ticket_model->get_all_tickets();
        $data['main_view'] = 'ticket/add_ticket_stock';
        $this->load->view('layouts/main',$data);
    }

    public function add_stock()
    {
        $stock_details = $this->input->post();
        $query = $this->ticket_model->add_stock($stock_details);
        if($query)
        {
            $this->session->set_flashdata('ticket_stock_updated','Ticket Stock Added');
            redirect('ticket/add_ticket_controller/get_all_tickets');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }
}
