<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_event_controller extends CI_Controller {

    //Add Event
    public function edit_event($event_id)
    {
        $data['event_detail'] = $this->event_model->get_events_by_id($event_id);
        $data['main_view'] = 'event/edit_event';
        $this->load->view('layouts/main',$data);
    }

    //Update Event
    public function update_event($event_id)
    {
        $event_detail = $this->input->post();
        $query = $this->event_model->update_event($event_detail,$event_id);
        if($query)
        {
            redirect('event/event_list_controller');
        }
        else
        {
            redirect('dashboard_controller');
        }
    }
}
