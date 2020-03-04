<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_ticket_stock_out extends CI_Controller {
    
    //GET TICKET INFO
    public function get_ticket_info($ticket_id)
    {
        $data['event_list'] = $this->event_model->get_all_events();
        $data['ticket_info'] = $this->ticket_model->get_tickets_by_id($ticket_id);
        $data['main_view'] = 'overview/edit_ticket_stock';
        $this->load->view('layouts/main',$data);
    }

    //Update Event
    public function update_ticket($ticket_id)
    {
        //CHECKING THE VALIDATION
        $this->form_validation->set_rules('ticketname','ticket name','trim|required');
        $this->form_validation->set_rules('price','price','trim|required');

		if($this->form_validation->run() == FALSE)
		{
            $data['event_list'] = $this->event_model->get_all_events();
            $data['ticket_info'] = $this->ticket_model->get_tickets_by_id($ticket_id);
            $data['main_view'] = 'overview/edit_ticket_stock';
            $this->load->view('layouts/main',$data);
        }
        else 
        {	
            $ticket_detail = $this->input->post();
            $query = $this->ticket_model->update_ticket($ticket_detail,$ticket_id);
            if($query)
            {
                $this->session->set_flashdata('ticket_stock_updated','Ticket Has Been Updated');
                redirect('overview/ticket_stock_out');
            }
            else
            {
                redirect('dashboard_controller');
            }
        }
    }

    //Delete From Database
    public function delete_ticket($ticket_id)
    {
        if($this->ticket_model->delete_ticket($ticket_id))
        {
            redirect('overview/ticket_stock_out');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }
    
}
