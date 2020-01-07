<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_guest_controller extends CI_Controller {

    //Add Event
    public function edit_guest($guest_id)
    {
        $data['event_list'] = $this->event_model->get_all_events();
        $data['currency'] = $this->setting_model->get_currency();
        $data['ticket_list'] = $this->ticket_model->get_all_tickets();
        $data['guest_detail'] = $this->guest_model->get_guest_by_id($guest_id);
        $data['main_view'] = 'guest/edit_guest';
        $this->load->view('layouts/main',$data);
    }

    //Update Event
    public function update_guest($guest_id)
    {
        $guest_detail = $this->input->post();
        $query = $this->guest_model->update_guest($guest_detail,$guest_id);
        if($query)
        {
            $this->session->set_flashdata('guest_updated','Guest Has Been Updated');
            redirect('guest/guest_list_controller');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }

    //Delete From Database
    public function delete_guest($guest_id)
    {
        if($this->guest_model->delete_guest($guest_id))
        {
            $this->session->set_flashdata('guest_deleted','Guest Has Been Deleted');
            redirect('guest/guest_list_controller');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }
}
