<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_ticket_controller extends CI_Controller {

    //Add Event
    public function edit_ticket($ticket_id)
    {
        $data['event_list'] = $this->event_model->get_all_events();
        $data['ticket_detail'] = $this->ticket_model->get_tickets_by_id($ticket_id);
        $data['main_view'] = 'ticket/edit_ticket';
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
            $data['ticket_detail'] = $this->ticket_model->get_tickets_by_id($ticket_id);
            $data['main_view'] = 'ticket/edit_ticket';
            $this->load->view('layouts/main',$data);
        }
        else 
        {
            $ticket_detail = $this->input->post();
            $query = $this->ticket_model->update_ticket($ticket_detail,$ticket_id);
            if($query)
            {
                $this->session->set_flashdata('ticket_updated','Ticket Has Been Updated');
                redirect('ticket/ticket_list_controller');
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
            redirect('ticket/ticket_list_controller');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }
}
