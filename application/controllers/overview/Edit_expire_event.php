<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_expire_event extends CI_Controller {

    //GET Event INFO
    public function get_event_info($event_id)
    {
        $data['event_info'] = $this->expired_event_model->get_event_info($event_id);
        $data['main_view'] = 'overview/edit_expire_event';
        $this->load->view('layouts/main',$data);
    }
    
    //UPDATE Event INFO
    public function update_expire_event($event_id)
    {   
        //CHECKING THE VALIDATION
        $this->form_validation->set_rules('eventname','event name','trim|required');

        if($this->form_validation->run() == FALSE)
        {
            $data['event_info'] = $this->expired_event_model->get_event_info($event_id);
            $data['main_view'] = 'overview/edit_expire_event';
            $this->load->view('layouts/main',$data);
        }
        else 
        {	
            $event_detail = $this->input->post();
            $query = $this->expired_event_model->update_expire_event($event_detail,$event_id);
            if($query)
            {
                $this->session->set_flashdata('expire_event_updated','Event Has Been Updated');
                redirect('overview/expired_events_controller');
            }
            else
            {
                redirect('dashboard_controller');
            }
        }
    }

    //Delete From Database
    public function delete_expire_event($event_id)
    {
        if($this->expired_event_model->delete_expire_event($event_id))
        {
            $this->session->set_flashdata('expire_event_deleted','Event Has Been Deleted');
            redirect('overview/expired_events_controller');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }

    



  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
      //Update Event
    public function update_ticket($ticket_id)
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

    //Delete From Database
    public function delete_ticket($ticket_id)
    {
        if($this->ticket_model->delete_ticket($ticket_id))
        {
            $this->session->set_flashdata('ticket_deleted','Ticket Has Been Deleted');
            redirect('ticket/ticket_list_controller');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }
}
